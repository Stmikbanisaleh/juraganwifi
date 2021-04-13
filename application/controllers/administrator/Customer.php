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

	public function showodc()
	{
		$wilayah = $this->input->post('id');
		$result = $this->model_customer->viewWhereCustomODC($wilayah)->result_array();
		echo "<option value='0'>--Pilih Data --</option>";
		foreach ($result as $value) {
			echo "<option value='" . $value['id'] . "'> [" . $value['kode'] . "] </option>";
		}
	}

	public function showEditodc()
	{
		$wilayah = $this->input->post('id');
		$result = $this->model_customer->viewWhereCustomODCV2($wilayah)->result_array();
		foreach ($result as $value) {
			echo "<option value='" . $value['id'] . "'> [" . $value['kode'] . "] </option>";
		}
	}

	public function showEditodp()
	{
		$wilayah = $this->input->post('id');
		$result = $this->model_customer->viewWhereCustomODPV2($wilayah)->result_array();
		foreach ($result as $value) {
			echo "<option value='" . $value['id'] . "'> [" . $value['kode'] . "] </option>";
		}
	}

	public function showodp()
	{
		$wilayah = $this->input->post('id');
		$result = $this->model_customer->viewWhereCustomODP($wilayah)->result_array();
		echo "<option value='0'>--Pilih Data --</option>";
		foreach ($result as $value) {
			echo "<option value='" . $value['id'] . "'> [" . $value['kode'] . "] </option>";
		}
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$mymerek = $this->model_customer->viewOrdering('merek_perangkat', 'id', 'desc')->result_array();
			$myjenisperangkat = $this->model_customer->viewOrdering('jenis_perangkat', 'id', 'desc')->result_array();
			$myjenislayanan = $this->model_customer->viewOrdering('package_item', 'id', 'desc')->result_array();
			$mymediakoneksi = $this->model_customer->viewOrdering('media_koneksi', 'id', 'desc')->result_array();
			$myjenisip = $this->model_customer->viewOrdering('jenis_ipaddress', 'id', 'desc')->result_array();
			$mytypeip = $this->model_customer->viewOrdering('type_ipaddress', 'id', 'desc')->result_array();
			$myjenistempat = $this->model_customer->viewOrdering('jenis_tempat', 'id', 'desc')->result_array();
			$mywilayah = $this->model_customer->viewOrdering('wilayah', 'id', 'desc')->result_array();
			$mystatuskepemilikan = $this->model_customer->viewOrdering('jenis_kepemilikan', 'id', 'desc')->result_array();
			$mystatuskepemilikanperangkat = $this->model_customer->viewOrdering('jenis_kepemilikan_perangkat', 'id', 'desc')->result_array();

			$data = array(
				'page_content'      => '../pageadmin/customer/view',
				'ribbon'            => '<li class="active">Customer</li>',
				'page_name'         => 'Customer',
				'myjenisperangkat'	=> $myjenisperangkat,
				'mymerek'			=> $mymerek,
				'myjenislayanan'	=> $myjenislayanan,
				'mymediakoneksi'	=> $mymediakoneksi,
				'myjenisip'			=> $myjenisip,
				'myjenistempat'		=> $myjenistempat,
				'mywilayah'			=> $mywilayah,
				'mystatuskepemilikan'	=> $mystatuskepemilikan,
				'mystatuskepemilikanperangkat'	=> $mystatuskepemilikanperangkat,
				'mytypeip'	=> $mytypeip

			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_customer->viewOrderingCustom()->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		$data_id = array(
			'id'  => $this->input->post('e_id')
		);
		$config['upload_path'] = './assets/customer';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$config["allowed_types"] = 'jpg|jpeg|png|gif|pdf';
		$config["max_size"] = 4096;
		$this->load->library('upload', $config);
		$do_upload = $this->upload->do_upload("e_foto");
		if ($do_upload) {
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			$data = array(
				'name'  => $this->input->post('e_nama'),
				'no_ktp'  => $this->input->post('e_ktp'),
				'email'  => $this->input->post('e_email'),
				'ipaddress'  => $this->input->post('e_ip_address'),
				'status'  => $this->input->post('e_status'),
				'no_services'  => str_replace(' ', '', $this->input->post('e_nomor_layanan')),
				'no_wa'  => $this->input->post('e_telp'),
				'address'  => $this->input->post('e_alamat'),
				'panjang_kabel'  => $this->input->post('e_panjangkabel'),
				'odp'  => $this->input->post('e_odp'),
				'olt'  => $this->input->post('e_olt'),
				'kodp'  => $this->input->post('e_kodp'),
				'kodc'  => $this->input->post('e_kodc'),
				'dokumen' => $file_name,
				'jenis_perangkat'  => $this->input->post('e_jenisperangkat'),
				'typeipaddress'  => $this->input->post('e_typeipaddress'),
				'merek_perangkat'  => $this->input->post('e_merekperangkat'),
				'serial_number'  => $this->input->post('e_serialnumber'),
				'mac_address'  => $this->input->post('e_macaddress'),
				'jenis_layanan'  => $this->input->post('e_jenislayanan'),
				'media_koneksi'  => $this->input->post('e_mediakoneksi'),
				'tgl_registrasi'  => $this->input->post('e_tglregistrasi'),
				'usernamepoe'  => $this->input->post('e_usernamepoe'),
				'p_ppoe'  => $this->input->post('e_p_ppoe'),
				'kepemilikan_perangkat'  => $this->input->post('e_kepemilikanperangkat'),
				'jenis_ipaddress'  => $this->input->post('e_jenisipaddress'),
				'tgl_aktivasi'  => $this->input->post('e_tglaktivasi'),
				'wilayah'  => $this->input->post('e_wilayah'),
				'jenis_tempat'  => $this->input->post('e_jenistempat'),
				'kepemilikan_tempat'  => $this->input->post('e_kepemilikantempat'),
				'nama_teknisi'  => $this->input->post('e_nama_teknisi'),
				'keterangan'  => $this->input->post('e_keterangan'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy'	=> $this->session->userdata('name')
			);
		} else {
			$data = array(
				'name'  => $this->input->post('e_nama'),
				'no_ktp'  => $this->input->post('e_ktp'),
				'email'  => $this->input->post('e_email'),
				'status'  => $this->input->post('e_status'),
				'no_services'  =>  str_replace(' ', '', $this->input->post('e_nomor_layanan')),
				'no_wa'  => $this->input->post('e_telp'),
				'address'  => $this->input->post('e_alamat'),
				'panjang_kabel'  => $this->input->post('e_panjangkabel'),
				'odp'  => $this->input->post('e_odp'),
				'olt'  => $this->input->post('e_olt'),
				'kodp'  => $this->input->post('e_kodp'),
				'ipaddress'  => $this->input->post('e_ip_address'),
				'typeipaddress'  => $this->input->post('e_typeipaddress'),
				'kodc'  => $this->input->post('e_kodc'),
				'jenis_perangkat'  => $this->input->post('e_jenisperangkat'),
				'merek_perangkat'  => $this->input->post('e_merekperangkat'),
				'serial_number'  => $this->input->post('e_serialnumber'),
				'mac_address'  => $this->input->post('e_macaddress'),
				'jenis_layanan'  => $this->input->post('e_jenislayanan'),
				'media_koneksi'  => $this->input->post('e_mediakoneksi'),
				'tgl_registrasi'  => $this->input->post('e_tglregistrasi'),
				'usernamepoe'  => $this->input->post('e_usernamepoe'),
				'p_ppoe'  => $this->input->post('e_p_ppoe'),
				'kepemilikan_perangkat'  => $this->input->post('e_kepemilikanperangkat'),
				'jenis_ipaddress'  => $this->input->post('e_jenisipaddress'),
				'tgl_aktivasi'  => $this->input->post('e_tglaktivasi'),
				'wilayah'  => $this->input->post('e_wilayah'),
				'jenis_tempat'  => $this->input->post('e_jenistempat'),
				'kepemilikan_tempat'  => $this->input->post('e_kepemilikantempat'),
				'nama_teknisi'  => $this->input->post('e_nama_teknisi'),
				'keterangan'  => $this->input->post('e_keterangan'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy'	=> $this->session->userdata('name')
			);
		}

		$action = $this->model_customer->update($data_id, $data, 'customer');
		echo json_encode($action);
	}

	public function tampil_byid()
	{
		$data = array(
			'id'  => $this->input->post('id'),
		);
		$my_data = $this->model_customer->view_where('customer', $data)->result();
		echo json_encode($my_data);
	}

	public function generate()
	{
		$wilayah = $this->input->post('id');
		$kodewilayah = $this->model_customer->getkodewilayah($wilayah)->row();
		$getmax = $this->db->query("select max(no_services) as nomor,count(no_services) tot from customer where left(no_services,4) = $kodewilayah->kode_wilayah")->result_array();
		$tot = $getmax[0]['tot'];
		$nomor = $getmax[0]['nomor'];
		if ($tot > 0) {
			$noreg = $this->db->query("SELECT
				RIGHT(no_services+1,5)AS idservice FROM customer where no_services = $nomor ORDER BY id DESC")->result_array();
			if (count($noreg) < 1) {
				$no = '00001';
			} else {
				$no = $noreg[0]['idservice'];
			}
			$kodewilayah = $kodewilayah->kode_wilayah;
			$idlayanan = $kodewilayah . $no;
			echo json_encode($idlayanan);
		} else {
			$no = '00001';
			$kodewilayah = $kodewilayah->kode_wilayah;
			$idlayanan = $kodewilayah . $no;
			echo json_encode($idlayanan);
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$config['upload_path'] = './assets/customer';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif|pdf';
			$config["max_size"] = 4096;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload("foto");
			if ($do_upload) {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$data = array(
					'name'  => $this->input->post('nama'),
					'no_ktp'  => $this->input->post('ktp'),
					'email'  => $this->input->post('email'),
					'status'  => 0,
					'no_services'  => str_replace('"', "", $this->input->post('nomor_layanan')),
					'no_wa'  => $this->input->post('telp'),
					'address'  => $this->input->post('alamat'),
					'panjang_kabel'  => $this->input->post('panjangkabel'),
					'odp'  => $this->input->post('odp'),
					'olt'  => $this->input->post('olt'),
					'typeipaddress'  => $this->input->post('typeipaddress'),
					'jenis_perangkat'  => $this->input->post('jenisperangkat'),
					'merek_perangkat'  => $this->input->post('merekperangkat'),
					'serial_number'  => $this->input->post('serialnumber'),
					'mac_address'  => $this->input->post('macaddress'),
					'jenis_layanan'  => $this->input->post('jenislayanan'),
					'media_koneksi'  => $this->input->post('mediakoneksi'),
					'tgl_registrasi'  => $this->input->post('tglregistrasi'),
					'ipaddress'  => $this->input->post('ip_address'),
					'kodp'  => $this->input->post('kodp'),
					'dokumen'	=> $file_name,
					'kodc'  => $this->input->post('kodc'),
					'usernamepoe'  => $this->input->post('usernamepoe'),
					'p_ppoe'  => $this->input->post('p_ppoe'),
					'kepemilikan_perangkat'  => $this->input->post('kepemilikanperangkat'),
					'jenis_ipaddress'  => $this->input->post('jenisipaddress'),
					'tgl_aktivasi'  => $this->input->post('tglaktivasi'),
					'wilayah'  => $this->input->post('wilayah'),
					'jenis_tempat'  => $this->input->post('jenistempat'),
					'kepemilikan_tempat'  => $this->input->post('kepemilikantempat'),
					'nama_teknisi'  => $this->input->post('nama_teknisi'),
					'keterangan'  => $this->input->post('keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			} else {
				$data = array(
					'name'  => $this->input->post('nama'),
					'no_ktp'  => $this->input->post('ktp'),
					'email'  => $this->input->post('email'),
					'status'  => 0,
					'no_services'  => str_replace('"', "", $this->input->post('nomor_layanan')),
					'no_wa'  => $this->input->post('telp'),
					'address'  => $this->input->post('alamat'),
					'panjang_kabel'  => $this->input->post('panjangkabel'),
					'odp'  => $this->input->post('odp'),
					'olt'  => $this->input->post('olt'),
					'ipaddress'  => $this->input->post('ip_address'),
					'typeipaddress'  => $this->input->post('typeipaddress'),
					'jenis_perangkat'  => $this->input->post('jenisperangkat'),
					'merek_perangkat'  => $this->input->post('merekperangkat'),
					'serial_number'  => $this->input->post('serialnumber'),
					'mac_address'  => $this->input->post('macaddress'),
					'jenis_layanan'  => $this->input->post('jenislayanan'),
					'media_koneksi'  => $this->input->post('mediakoneksi'),
					'tgl_registrasi'  => $this->input->post('tglregistrasi'),
					'kodp'  => $this->input->post('kodp'),
					'kodc'  => $this->input->post('kodc'),
					'usernamepoe'  => $this->input->post('usernamepoe'),
					'p_ppoe'  => $this->input->post('p_ppoe'),
					'kepemilikan_perangkat'  => $this->input->post('kepemilikanperangkat'),
					'jenis_ipaddress'  => $this->input->post('jenisipaddress'),
					'tgl_aktivasi'  => $this->input->post('tglaktivasi'),
					'wilayah'  => $this->input->post('wilayah'),
					'jenis_tempat'  => $this->input->post('jenistempat'),
					'kepemilikan_tempat'  => $this->input->post('kepemilikantempat'),
					'nama_teknisi'  => $this->input->post('nama_teknisi'),
					'keterangan'  => $this->input->post('keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			}

			$cek = $this->model_customer->checkDuplicate($data, 'customer');
			if ($cek > 0) {
				echo json_encode(401);
			} else {
				$action = $this->model_customer->insert($data, 'customer');
				echo json_encode($action);
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
			$action = $this->model_customer->delete($data_id, 'customer');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function aktif()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);
			$data = array(
				'status'  => 1
			);
			$action = $this->model_customer->update($data_id, $data, 'customer');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function nonaktif()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);
			$data = array(
				'status'  => 0
			);
			$action = $this->model_customer->update($data_id, $data, 'customer');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
