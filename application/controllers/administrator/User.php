<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_user');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data = array(
				'page_content'      => '../pageadmin/user/view',
				'ribbon'            => '<li class="active">Daftar User</li>',
				'page_name'         => 'Daftar User',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_user->viewOrdering('user', 'id', 'desc')->result_array();
			echo json_encode($my_data);
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
			$my_data = $this->model_user->viewWhere('user', $data)->result();
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
			$password = md5($this->input->post('e_password'));
			$password = hash("sha512", $password);

			$password2 = md5($this->input->post('e_passwordconfirm'));
			$password2 = hash("sha512", $password2);
			if ($password == null || $password == "" || $password2 == null || $password2 == "") {
				$data = array(
					'name'  => $this->input->post('e_nama'),
					'email'  => $this->input->post('e_email'),
					'phone'  => $this->input->post('e_telp'),
					'address'  => $this->input->post('e_alamat'),
					'is_active'  => $this->input->post('e_status'),
					'updatedAt' => date('Y-m-d H:i:s'),
					'updatedBy'	=> $this->session->userdata('name')
				);
				$action = $this->model_user->update($data_id, $data, 'user');
				echo json_encode($action);
			} else {
				if ($password == $password2) {
					$data = array(
						'name'  => $this->input->post('e_nama'),
						'email'  => $this->input->post('e_email'),
						'phone'  => $this->input->post('e_telp'),
						'address'  => $this->input->post('e_alamat'),
						'is_active'  => $this->input->post('e_status'),
						'password'	=> $password,
						'updatedAt' => date('Y-m-d H:i:s'),
						'updatedBy'	=> $this->session->userdata('name')
					);
					$action = $this->model_user->update($data_id, $data, 'user');
					echo json_encode($action);
				} else {
					echo json_encode(400);
				}
			}
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
			$action = $this->model_user->delete($data_id, 'user');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$password = md5($this->input->post('password'));
			$password = hash("sha512", $password);

			$password2 = md5($this->input->post('passwordconfirm'));
			$password2 = hash("sha512", $password2);
			if ($password == $password2) {
				$data = array(
					'name'  => $this->input->post('nama'),
					'email'  => $this->input->post('email'),
					'phone'  => $this->input->post('telp'),
					'address'  => $this->input->post('alamat'),
					'password'	=> $password,
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
				$cek = $this->model_user->checkDuplicate($data, 'user');
				if ($cek > 0) {
					echo json_encode(401);
				} else {
					$action = $this->model_user->insert($data, 'user');
					echo json_encode($action);
				}
			} else {
				echo json_encode(400);
			}
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
