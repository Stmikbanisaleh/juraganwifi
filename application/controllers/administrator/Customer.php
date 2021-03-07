<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_customer');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data = array(
				'page_content'      => '../pageadmin/customer/view',
				'ribbon'            => '<li class="active">Customer</li>',
				'page_name'         => 'Customer',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_customer->viewOrdering('customer','id','desc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		$data_id = array(
			'idsaldo'  => $this->input->post('e_id')
		);
		$data = array(
			'TotalTagihan'  => $this->input->post('e_tot_tagihan_v'),
			'Bayar'  => $this->input->post('e_bayar_v'),
			'Sisa'  => $this->input->post('e_sisa_v'),
			'tipe_generate'  => 'N',
			'updatedAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_tunggakan->update($data_id, $data, 'saldopembayaran_sekolah');
		echo json_encode($action);
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
