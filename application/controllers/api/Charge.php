<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Set your Merchant Server Key
\Midtrans\Config::$serverKey = '<your server key>';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;
class Charge extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_agama');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$transaction_details = array(
				'order_id'    => time(),
				'gross_amount'  => 200000
			);


			// Populate items
			$items = array(
				array(
					'id'       => 'item1',
					'price'    => 100000,
					'quantity' => 1,
					'name'     => 'Adidas f50'
				),
				array(
					'id'       => 'item2',
					'price'    => 50000,
					'quantity' => 2,
					'name'     => 'Nike N90'
				)
			);

			// Populate customer's billing address
			$billing_address = array(
				'first_name'   => "Andri",
				'last_name'    => "Setiawan",
				'address'      => "Karet Belakang 15A, Setiabudi.",
				'city'         => "Jakarta",
				'postal_code'  => "51161",
				'phone'        => "081322311801",
				'country_code' => 'IDN'
			);

			// Populate customer's shipping address
			$shipping_address = array(
				'first_name'   => "John",
				'last_name'    => "Watson",
				'address'      => "Bakerstreet 221B.",
				'city'         => "Jakarta",
				'postal_code'  => "51162",
				'phone'        => "081322311801",
				'country_code' => 'IDN'
			);

			// Populate customer's info
			$customer_details = array(
				'first_name'       => "Andri",
				'last_name'        => "Setiawan",
				'email'            => "test@test.com",
				'phone'            => "081322311801",
				'billing_address'  => $billing_address,
				'shipping_address' => $shipping_address
			);
			
			// Token ID from checkout page
			$token_id = $_POST['token_id'];

			// Transaction data to be sent
			$transaction_data = array(
				'payment_type' => 'credit_card',
				'credit_card'  => array(
					'token_id'      => $token_id,
					'authentication' => true,
					//        'bank'          => 'bni', // optional to set acquiring bank
					//        'save_token_id' => true   // optional for one/two clicks feature
				),
				'transaction_details' => $transaction_details,
				'item_details'        => $items,
				'customer_details'    => $customer_details
			);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
