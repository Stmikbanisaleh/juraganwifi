<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;
// Load Composer's autoloader
require 'vendor/autoload.php';

class Blast_email extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
		error_reporting(0); 
        $this->load->library('form_validation');
        $this->load->model('administrator/model_generate_tagihan_log');
    }

    function render_view($data)
    {
        $this->template->load('templateadmin', $data); //Display Page
    }
    
    public function index()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
            $data = array(
                'page_content'      => '../pageadmin/sendtagihan/view',
                'ribbon'            => '<li class="active">Kirim Tagihan Email</li>',
                'page_name'         => 'Tagihan Email',
            );
            $this->render_view($data); //Memanggil function render_view
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }

	public function generateTagihan()
	{
		$this->load->library('pdf');
		$month = $this->input->post('bulan');
		$year = $this->input->post('tahun');
		$listInvoice = $this->model_generate_tagihan_log->cekInvoice($month,$year)->result_array();
		foreach ($listInvoice as $value ){
			// $item_list = $this->model_generate_tagihan_log->viewCustomer($value['invoice'])->result_array();
			$dataUser = $this->model_generate_tagihan_log->viewPelanggan($value['invoice'])->result_array();
	
			$email = $dataUser[0]['email'];
			$this->sendEmail($email,$value['invoice']);
		}
		echo json_encode(true);
	}

	public function sendEmail($email, $invoice)
	{
		$data = array(
			'type' => 'TAGIHAN'
		);
		$mail = new PHPMailer(true);
		//Server settings
		$configEmail = $this->model_generate_tagihan_log->viewWhereOrdering('email', $data, 'id', 'desc')->result_array();
		$configEmail = $configEmail[0];
		$dataCustomer = $this->model_generate_tagihan_log->getDataByInvoice($invoice)->result_array();

		$dataCustomer = $dataCustomer[0];
		$html = '';
		try {
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'mail.gemanurani.sch.id';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'nilai@gemanurani.sch.id';                     // SMTP username
			$mail->Password   = 'imam6325';                               // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = '587';                                     // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('nilai@gemanurani.sch.id');
			// $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			$mail->addAddress($email);               // Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			$mail->addBCC('imamsatrianta@gmail.com');

			// // Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			$mail->addAttachment(APPPATH.'public/Petunjuk-Pembayaran-VA.pdf', 'Cara Pembayaran');    // Optional name
			$mail->addAttachment(APPPATH.'public/'.$invoice.'.pdf', 'Invoice Tagihan');    // Optional name
			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Tagihan Pembayaran Juragan WIfi Indonesia ';
			$html='
			<table>
			<tbody>
			<tr>
			<td>
			<h1>Dear Sdr '.$dataCustomer['name'].',</h1>
			<p>Terima kasih atas kepercayaan Anda dalam menggunakan Layanan <span class="il">Juragan</span> Wifi.</p>
			</td>
			</tr>
			</tbody>
			</table>
			<table>
			<tbody>
			<tr>
			<th>Berikut ini rincian tagihan Anda :</th>
			</tr>
			<tr>
			<th>&bull; Nama Pelanggan</th>
			<td>:'.$dataCustomer['name'].'</td>
			</tr>
			<tr>
			<th>&bull; Subscriber ID</th>
			<td>:'.$dataCustomer['no_services'].'</td>
			</tr>
			<tr>
			<th>&bull; Jumlah Tagihan</th>
			<td>:'.$dataCustomer['Nominal'].'</td>
			</tr>
			<tr>
			<th>&bull; Tanggal Penagihan</th>
			<td>:'.$dataCustomer['periode_awal'].'</td>
			</tr>
			<tr>
			<th>&bull; Periode Penagihan</th>
			<td>: '.$dataCustomer['periode_awal'].' - '.$dataCustomer['periode_akhir'].'</td>
			</tr>
			<tr>
			<th>&bull; Jatuh Tempo</th>
			<td>:'.$dataCustomer['jatuh_tempo'].'</td>
			</tr>
			<tr>
			<th>&bull; Link Pembayaran</th>
			<td>: <a target="_blank" href="'.$dataCustomer['token'].'">Klink Link Pembayaran</td>
			</tr>
			</tbody>
			</table>
			<table>
			<tbody>
			'.$configEmail['footer'].'
			</tbody>
			</table>';
			$mail->Body    = $html;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->send();
			// echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_generate_tagihan_log->viewOrderingTagihan()->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
