<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_tagihanc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_daftar_tagihanc');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function delete()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);
			$action = $this->model_daftar_tagihanc->delete($data_id, 'invoice_corporate');

			$data_id2 = array(
				'invoice_id'  => $this->input->post('id')
			);
			$this->model_daftar_tagihanc->delete($data_id2, 'invoice_detail_corporate');

			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data = array(
				'page_content'      => '../pageadmin/daftartagihancorporate/view',
				'ribbon'            => '<li class="active">Daftar Tagihan</li>',
				'page_name'         => 'Daftar Tagihan',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_daftar_tagihanc->viewOrderingCustom()->result_array();
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
            $tagihan = $this->model_daftar_tagihanc->gettagihan($this->input->post('e_id'))->result_array();
            $tagihan = $tagihan[0]['price'];
            $bayar = $this->input->post('e_nominal_v');
            if($bayar > $tagihan ){
                echo json_encode(400);
            } else {
                if($tagihan <= $bayar ){
                    $dataInvoce = array(
                        'status'  => 1,
                        'updatedAt' => date('Y-m-d H:i:s'),
                        'updatedBy' => $this->session->userdata('name'),
                    );
                   $this->model_daftar_tagihanc->update($data_id, $dataInvoce, 'invoice_corporate');
                } else {
                    $dataInvoce = array(
                        'status'  => 0,
                        'updatedAt' => date('Y-m-d H:i:s'),
                        'updatedBy' => $this->session->userdata('name'),
                    );
                   $this->model_daftar_tagihanc->update($data_id, $dataInvoce, 'invoice_corporate');
                }
                $data = array(
                    'nominal_bayar'  => $this->input->post('e_nominal_v'),
                    'updatedAt' => date('Y-m-d H:i:s'),
                    'updatedBy' => $this->session->userdata('name'),
                );
                $action = $this->model_daftar_tagihanc->update($data_id, $data, 'invoice_detail_corporate');
                echo json_encode($action);
            }
           
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$my_data = $this->model_daftar_tagihanc->viewWhere('invoice', $this->input->post('id'))->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

}
