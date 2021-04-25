<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'Mid-server-bZaYQrhSiFwmKleeDJIa1egv', 'production' => true);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		$this->load->model('administrator/model_generate_tagihan_log');
	}

	public function index()
	{
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result);

		if ($result) {
			$notif = $this->veritrans->status($result->order_id);
		}
		$data = array(
			'invoice' => $result->order_id,
			'log'  => json_encode($result),
			'message' => json_encode($notif),
			'createdAt' => date('Y-m-d H:i:s'),
		);
		$this->model_generate_tagihan_log->insert($data, 'veritrans_log');
		error_log(print_r($result, TRUE));

		//notification handler sample
		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$nominal = $notif->gross_amount;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;
		if ($transaction == 'capture') {
			// For credit card transaction, we need to check whether transaction is challenge by FDS or not
			if ($type == 'credit_card') {
				if ($fraud == 'challenge') {
					// TODO set payment status in merchant's database to 'Challenge by FDS'
					// TODO merchant should decide whether this transaction is authorized or not in MAP
					echo "Transaction order_id: " . $order_id . " is challenged by FDS";
				} else {
					// TODO set payment status in merchant's database to 'Success'
					echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
				}
			}
		} else if ($transaction == 'settlement') {
			// TODO set payment status in merchant's database to 'Settlement'
			$data_id = array(
				'invoice'  => $order_id
			);
			$data = array(
				'status'  => 1,
				'metode_pembayaran'  => $type,
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => 'Midtrans System Notification',
			);
			$this->model_generate_tagihan_log->update($data_id, $data, 'invoice');
			$id = $this->db->query("select a.id from invoice_detail a join invoice b on a.invoice_id = b.id where b.invoice = $order_id ")->result_array();
			$id = $id[0];
			$data_id2 = array(
				'id'  => $id['id']
			);
			$data2 = array(
				'nominal_bayar'  => $nominal,
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => 'Midtrans System Notification',
			);
			$this->model_generate_tagihan_log->update($data_id2, $data2, 'invoice_detail');

			$response = array('status' => 'OK');

			$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
				->_display();
		} else if ($transaction == 'pending') {
			// TODO set payment status in merchant's database to 'Pending'
			echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
		} else if ($transaction == 'deny') {
			// TODO set payment status in merchant's database to 'Denied'
			echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		}
	}
}
