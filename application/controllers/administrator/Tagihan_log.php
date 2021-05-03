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
	public function generateInvoice()
	{
		$noreg = $this->db->query("SELECT invoice as maxno from invoice order by id desc")->result_array();
		
		$invoiceDate = date('mdY');
		$kata = '/JWI/RTL/';
		if (count($noreg) < 1) {
			$urutan = 'INV000001'.$kata.$invoiceDate;
		} else {
			$no = $noreg[0]['maxno'];
			$urutan =  (int)substr($no, 3, 9);
			$urutan = $urutan + 1;
			$urutan = 'INV' . sprintf("%05s", $urutan).$kata.$invoiceDate;
		}

		return $urutan;
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
		$listNoServices = $this->model_generate_tagihan_log->viewOrderingCustom('customer', 'id', 'asc')->result_array();
		$no = 1;
		foreach ($listNoServices as $noVal) {
			$cek = $this->model_generate_tagihan_log->cek($this->input->post('bulan'), $this->input->post('tahun'), $noVal['no_services']);
			if ($cek->num_rows() == 0) {
				$dataCek = $cek->result_array();
				$generateTagihanData = $this->model_generate_tagihan_log->generateTagihan($noVal['no_services'])->result_array();

				if ($generateTagihanData) {
					$invoice = $this->generateInvoice();
					$dataInvoice = array(
						'invoice' => $invoice = str_replace(' ', '', $invoice),
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
							'no_unik' => $no,
							'item_id' => $val['item_id'],
							'd_month' => $this->input->post('bulan'),
							'd_year' => $this->input->post('tahun')
						);
						$insertInvoiceDetail = $this->model_generate_tagihan_log->insert($dataInvoiceDetail, 'invoice_detail');
					}

					//generate Inovice
					// $this->generateTagihan($this->input->post('bulan'), $this->input->post('tahun') );
					$token = $this->token($invoice, $no);
					$data_id = array(
						'invoice'  => $invoice
					);

					$dataToken = array(
						"token" => "https://app.midtrans.com/snap/v2/vtweb/" . $token
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
		$listInvoice = $this->model_generate_tagihan_log->cekInvoice($month, $year)->result_array();
		foreach ($listInvoice as $value) {

			$item_list = $this->model_generate_tagihan_log->viewCustomer($value['invoice'])->result_array();
			$dataUser = $this->model_generate_tagihan_log->viewPelanggan($value['invoice'])->result_array();

			$data = array(
				'invoice' => $value['invoice'],
				'createdAt' => date('d-m-Y'),
				'due_date'  => date('d-m-Y', strtotime('today + 14 days')),
				'item_list' => $item_list,
				'user' => $dataUser,
			);
			// $this->pdf->load_view('pageadmin/laporan/invoice', $data);
			$mpdf = new \Mpdf\Mpdf();
			$data = $this->load->view('pageadmin/laporan/invoice', $data, TRUE);
			$mpdf->WriteHTML($data);
			$mpdf->Output(APPPATH . "/public/" . $value['invoice'] . ".pdf", \Mpdf\Output\Destination::FILE);
		}
	}

	public function downloadTagihan()
	{
		// if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$this->load->library('dateutil');
			$this->load->library('util');
			$listInvoice = $this->model_generate_tagihan_log->viewWhereCustom($this->input->get('invoice'))->result_array();
			foreach ($listInvoice as $value) {

				$item_list = $this->model_generate_tagihan_log->viewCustomer($value['invoice'])->result_array();
				$dataUser = $this->model_generate_tagihan_log->viewPelanggan($value['invoice'])->result_array();
				$data = array(
					'invoice' => $value['invoice'],
					'monthname' => $this->dateutil->getMonthNameIndo($value['month']),
					'createdAt' => date('d-m-Y'),
					'due_date'  => date('d-m-Y', strtotime('today + 14 days')),
					'item_list' => $item_list,
					'kode_unik' => $dataUser[0]['id'],
					'user' => $dataUser,
				);
				// $this->pdf->load_view('pageadmin/laporan/invoice', $data);
				$mpdf = new \Mpdf\Mpdf();
				$mpdf->SetDisplayMode('fullwidth');
				$data = $this->load->view('pageadmin/laporan/invoiceV2', $data, TRUE);
				$mpdf->WriteHTML($data);
				// $mpdf->Output(APPPATH . "/public/" . $value['invoice'] . ".pdf", \Mpdf\Output\Destination::FILE);
				$filename = $value['invoice'] . ".pdf";
				$mpdf->Output($filename,"I");
			}
		// } else {
		// 	$this->load->view('pageadmin/login'); //Memanggil function render_view
		// }
	}

	public function token($invoice, $no)
	{
		$dataBill = $this->db->query("select b.no_unik, a.invoice,sum(b.price) as price,c.name as package, c.id as packageid,
		d.no_services as no_pelanggan, d.name as nama_customer,d.address,d.no_wa,d.email   from invoice a
		left join invoice_detail b on a.id = b.invoice_id 
		left join package_item c on b.item_id = c.id
		left join customer d on a.no_services = d.no_services
		where a.invoice = '$invoice' group by a.invoice
		")->result_array();
		$dataBill = $dataBill[0];
		$dataBill2 = $this->db->query("select b.no_unik, a.invoice,b.price,c.name as package, c.id as packageid,
		d.no_services as no_pelanggan, d.name as nama_customer,d.address,d.no_wa,d.email   from invoice a
		left join invoice_detail b on a.id = b.invoice_id 
		left join package_item c on b.item_id = c.id
		left join customer d on a.no_services = d.no_services
		where a.invoice = '$invoice' 
		")->result_array();

		// Required
		$transaction_details = array(
			'order_id' => $dataBill['invoice'],
			'gross_amount' => $dataBill['price'] // no decimal allowed for creditcard
		);
		$no = 1;
		$item_details = array();
		foreach($dataBill2 as $val){
			// Optional
			$item_details = array(
				'id' => $val['packageid'],
				'price' => $val['price'],
				'quantity' => 1,
				'name' => $dataBill['package']
			);
			$item_details = array_push($item_details, $item_details);
		}

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

		$credit_card['secure'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 30
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry,
			'custom_field1' => $dataBill['no_pelanggan'],
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
