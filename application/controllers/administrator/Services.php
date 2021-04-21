<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_service');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$mylayanan = $this->model_service->viewOrdering('package_item', 'id', 'desc')->result_array();
			$mycustomer = $this->model_service->viewOrdering('customer', 'id', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/service/view',
				'ribbon'            => '<li class="active">Daftar Layanan</li>',
				'page_name'         => 'Daftar Layanan',
				'mylayanan'			=> $mylayanan,
				'mycustomer'		=> $mycustomer,
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_service->viewOrderingCustom('service', 'id', 'desc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data_id = array(
				'id'  => $this->input->post('e_id')
			);
			$data = array(
				'id_customer'  => $this->input->post('e_customer'),
				'id_service'  => $this->input->post('e_layanan'),
				'keterangan'  => $this->input->post('e_keterangan'),
				'createdAt' => date('Y-m-d H:i:s'),
			);
			$action = $this->model_service->update($data_id, $data, 'service');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data = array(
				'id'  => $this->input->post('id'),
			);
			$my_data = $this->model_service->viewWhere('service', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function delete()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);
			$action = $this->model_service->delete($data_id, 'service');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
$cust = " ".$this->input->post('customer')." ";
			$data = array(
				'id_customer'  => $cust,
				'id_service'  => $this->input->post('layanan'),
				'keterangan'  => $this->input->post('keterangan'),
				'createdAt' => date('Y-m-d H:i:s'),
			);
			$action = $this->model_service->insert($data, 'service');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
