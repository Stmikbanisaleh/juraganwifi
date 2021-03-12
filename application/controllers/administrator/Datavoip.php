<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datavoip extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_data_voip');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$myvendor = $this->model_data_voip->viewOrdering('vendor_detail', 'id', 'desc')->result_array();
			$mymediakoneksi = $this->model_data_voip->viewOrdering('media_koneksi', 'id', 'desc')->result_array();
			$myjenisperangkat = $this->model_data_voip->viewOrdering('jenis_perangkat', 'id', 'desc')->result_array();
			$mymerekperangkat = $this->model_data_voip->viewOrdering('merek_perangkat', 'id', 'desc')->result_array();
			$mystatuskepemilikanperangkat = $this->model_data_voip->viewOrdering('jenis_kepemilikan_perangkat', 'id', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/datavoip/view',
				'ribbon'            => '<li class="active">Data Pelanggan Voip</li>',
				'page_name'         => 'Data Pelanggan Voip',
				'myvendor'			=> $myvendor,
				'mymediakoneksi'	=> $mymediakoneksi,
				'myjenisperangkat'	=> $myjenisperangkat,
				'mymerekperangkat'	=> $mymerekperangkat,
				'mystatuskepemilikanperangkat' => $mystatuskepemilikanperangkat
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_data_voip->viewOrderingCustom()->result_array();
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
                'nama'  => $this->input->post('e_nama'),
                'nomor'  => $this->input->post('e_nomor'),
                'alamat'  => $this->input->post('e_alamat'),
                'limit_pemakaian'  => $this->input->post('e_limit'),
                'vendor'  => $this->input->post('e_vendor'),
                'media_koneksi'  => $this->input->post('e_media_koneksi'),
                'jenis_perangkat'  => $this->input->post('e_jenis_perangkat'),
                'merek_perangkat'  => $this->input->post('e_merek_perangkat'),
                'status_kepemilikan_perangkat'  => $this->input->post('e_status_kepemilikan'),
                'serialnumber'  => $this->input->post('e_serialnumber'),
				'keterangan'  => $this->input->post('e_keterangan'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy'	=> $this->session->userdata('name')
            );
			$action = $this->model_data_voip->update($data_id, $data, 'data_pelanggan_voip');
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
			$my_data = $this->model_data_voip->viewWhere('data_pelanggan_voip', $data)->result();
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
            $action = $this->model_data_voip->delete($data_id, 'data_pelanggan_voip');
            echo json_encode($action);
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }


    public function simpan()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

            $data = array(
                'nama'  => $this->input->post('nama'),
                'nomor'  => $this->input->post('nomor'),
                'alamat'  => $this->input->post('alamat'),
                'limit_pemakaian'  => $this->input->post('limit'),
                'vendor'  => $this->input->post('vendor'),
                'media_koneksi'  => $this->input->post('media_koneksi'),
                'jenis_perangkat'  => $this->input->post('jenis_perangkat'),
                'merek_perangkat'  => $this->input->post('merek_perangkat'),
                'status_kepemilikan_perangkat'  => $this->input->post('status_kepemilikan'),
                'serialnumber'  => $this->input->post('serialnumber'),
				'keterangan'  => $this->input->post('keterangan'),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy'	=> $this->session->userdata('name')
            );
			$cek = $this->model_data_voip->checkDuplicate($data,'data_pelanggan_voip');
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_data_voip->insert($data, 'data_pelanggan_voip');
				echo json_encode($action);
			}

        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }
}
