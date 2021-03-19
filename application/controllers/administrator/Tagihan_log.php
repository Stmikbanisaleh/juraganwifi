<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;
use Dompdf\Options;
// Load Composer's autoloader
require 'vendor/autoload.php';
class Tagihan_log extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'Mid-server-bZaYQrhSiFwmKleeDJIa1egv', 'production' => true);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
		$this->load->library('form_validation');
		$this->load->model('administrator/model_generate_tagihan_log');
		$this->load->library('pdf');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data = array(
				'page_content'      => '../pageadmin/tagihan_log/view',
				'ribbon'            => '<li class="active">Generate Tagihan</li>',
				'page_name'         => 'Generate Tagihan',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_generate_tagihan_log->viewOrdering('tagihan_generate_log', 'id', 'desc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function generate()
	{
		$action = 0;
		$data = array(
			'bulan'  => $this->input->post('bulan'),
			'tahun'  => $this->input->post('tahun'),
			'createdAt' => date('Y-m-d H:i:s'),
			'createdBy' => $this->session->userdata('name'),
		);
		$listNoServices = $this->model_generate_tagihan_log->viewOrdering('customer', 'id', 'asc')->result_array();
		$no=1;
		foreach ($listNoServices as $noVal) {
			$cek = $this->model_generate_tagihan_log->cek($this->input->post('bulan'), $this->input->post('tahun'), $noVal['no_services']);
			if ($cek->num_rows() == 0) {
				$dataCek = $cek->result_array();
					$generateTagihanData = $this->model_generate_tagihan_log->generateTagihan($noVal['no_services'])->result_array();
					if ($generateTagihanData) {
						$invoiceNo = strtotime(date('Y-m-d H:i:s'));
						$invoice =  $invoiceNo.$no;
						$dataInvoice = array(
							'invoice' => $invoice,
							'month' => $this->input->post('bulan'),
							'year' => $this->input->post('tahun'),
							'no_services' => $noVal['no_services'],
							'status' => 0,
							'createdAt' => date('Y-m-d H:i:s'),
							'due_date' => date('Y-m-d', strtotime('today + 30 days'))
						);
						$insertInvoice = $this->model_generate_tagihan_log->insert($dataInvoice, 'invoice');
						$id = $this->db->insert_id();
						foreach ($generateTagihanData as $val) {
							$dataInvoiceDetail = array(
								'invoice_id' => $id,
								'price' => $val['price'],
								'nominal_bayar' => 0,
								'item_id' => $val['item_id'],
								'd_month' => $this->input->post('bulan'),
								'd_year' => $this->input->post('tahun')
							);
							$insertInvoiceDetail = $this->model_generate_tagihan_log->insert($dataInvoiceDetail, 'invoice_detail');
						}
						$this->generateTagihan($this->input->post('bulan'), $this->input->post('tahun') );
						$token = $this->token($invoice);
						$data_id = array(
							'invoice'  => $invoice
						);
				
						$dataToken = array(
							"token" => "https://app.midtrans.com/snap/v2/vtweb/".$token
						);
						$action = $this->model_generate_tagihan_log->update($data_id, $dataToken, 'invoice');
						
					}
			}
			$no++;
		}
		$action = $this->model_generate_tagihan_log->insert($data, 'tagihan_generate_log');
		echo json_encode(true);
	}

	public function generateTagihan($bulan, $tahun)
	{
		$month = $bulan;
		$year = $tahun;
		$listInvoice = $this->model_generate_tagihan_log->cekInvoice($month,$year)->result_array();
		foreach ($listInvoice as $value ){
			
			$item_list = $this->model_generate_tagihan_log->viewCustomer($value['invoice'])->result_array();
			$dataUser = $this->model_generate_tagihan_log->viewPelanggan($value['invoice'])->result_array();
			
			$email = $dataUser[0]['email'];
			$data = array(
				'invoice' => $value['invoice'],
				'createdAt' => date('d-m-Y'),
				'due_date'  => date('d-m-Y', strtotime('today + 14 days')),
				'item_list' => $item_list,
				'user' => $dataUser,
			);
			// $this->pdf->load_view('pageadmin/laporan/invoice', $data);
			$mpdf = new \Mpdf\Mpdf();
			$data = $this->load->view('pageadmin/laporan/invoice',$data, TRUE);
			$mpdf->WriteHTML($data);
			$mpdf->Output(APPPATH . "/public/".$value['invoice'].".pdf", \Mpdf\Output\Destination::FILE);
		}
	}

	public function token($invoice)
    {
		$dataBill = $this->db->query("select a.invoice,b.price,c.name as package, c.id as packageid,
		d.name as nama_customer,d.address,d.no_wa,d.email   from invoice a
		join invoice_detail b on a.id = b.invoice_id 
		join package_item c on b.item_id = c.id
		join customer d on a.no_services = d.no_services
		where a.invoice = $invoice group by a.invoice
		")->result_array();

		$dataBill = $dataBill[0];
		// Required
		$transaction_details = array(
		  'order_id' => $dataBill['invoice'],
		  'gross_amount' =>$dataBill['price'], // no decimal allowed for creditcard
		);

		// Optional
		$item_details = array(
		  'id' => $dataBill['packageid'],
		  'price' => $dataBill['price'],
		  'quantity' => 1,
		  'name' => $dataBill['package']
		);

		// // Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// // Optional
		// $item_details = array ($item1_details, $item2_details);

		// Optional
		$billing_address = array(
		  'first_name'    => $dataBill['nama_customer'],
		  'last_name'     => "",
		  'address'       => $dataBill['address'],
		  'phone'         => $dataBill['no_wa'],
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => $dataBill['nama_customer'],
			'last_name'     => "",
			'address'       => $dataBill['address'],
			'phone'         => $dataBill['no_wa'],
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $dataBill['nama_customer'],
			'last_name'     => "",
		  'email'         => $dataBill['email'],
		  'phone'         => $dataBill['no_wa'],
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'day', 
            'duration'  => 30
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		return $snapToken;
    }

	public function tampil_byid()
	{
		$data = array(
			'idsaldo'  => $this->input->post('id'),
		);
		$my_data = $this->model_tunggakan->view_where('saldopembayaran_sekolah', $data)->result();
		echo json_encode($my_data);
	}
}
