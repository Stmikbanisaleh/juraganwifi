<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Set your Merchant Server Key

class Notification extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		require_once dirname(APPPATH) . '/vendor/midtrans/midtrans-php/Midtrans.php';
		$json_result = file_get_contents('php://input');
		$notif = json_decode($json_result);
		$transaction = $notif->transaction_status;
		$fraud = $notif->fraud_status;

 		if ($transaction == 'capture') {
			if ($fraud == 'challenge') {
				echo "chanalge";
				// TODO Set payment status in merchant's database to 'challenge'
			} else if ($fraud == 'accept') {
				// TODO Set payment status in merchant's database to 'success'
				echo "accept";
			}
		} else if ($transaction == 'cancel') {
			if ($fraud == 'challenge') {
				// TODO Set payment status in merchant's database to 'failure'
			} else if ($fraud == 'accept') {
				// TODO Set payment status in merchant's database to 'failure'
			}
		} else if ($transaction == 'deny') {
			// TODO Set payment status in merchant's database to 'failure'
		}
	}
}
