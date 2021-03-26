<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Corporate extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_corporate');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function showodc()
	{
		$wilayah = $this->input->post('id');
		$result = $this->model_corporate->viewWhereCustomODC($wilayah)->result_array();
		echo "<option value='0'>--Pilih Data --</option>";
		foreach ($result as $value) {
			echo "<option value='" . $value['id'] . "'> [" . $value['kode'] . "] </option>";
		}
	}

	public function showEditodc()
	{
		$wilayah = $this->input->post('id');
		$result = $this->model_corporate->viewWhereCustomODCV2($wilayah)->result_array();
		foreach ($result as $value) {
			echo "<option value='" . $value['id'] . "'> [" . $value['kode'] . "] </option>";
		}
	}

	public function showEditodp()
	{
		$wilayah = $this->input->post('id');
		$result = $this->model_corporate->viewWhereCustomODPV2($wilayah)->result_array();
		foreach ($result as $value) {
			echo "<option value='" . $value['id'] . "'> [" . $value['kode'] . "] </option>";
		}
	}

	public function showodp()
	{
		$wilayah = $this->input->post('id');
		$result = $this->model_corporate->viewWhereCustomODP($wilayah)->result_array();
		echo "<option value='0'>--Pilih Data --</option>";
		foreach ($result as $value) {
			echo "<option value='" . $value['id'] . "'> [" . $value['kode'] . "] </option>";
		}
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$mymerek = $this->model_corporate->viewOrdering('merek_perangkat', 'id', 'desc')->result_array();
			$myjenisperangkat = $this->model_corporate->viewOrdering('jenis_perangkat', 'id', 'desc')->result_array();
			$myjenislayanan = $this->model_corporate->viewOrdering('package_item', 'id', 'desc')->result_array();
			$mymediakoneksi = $this->model_corporate->viewOrdering('media_koneksi', 'id', 'desc')->result_array();
			$myjenisip = $this->model_corporate->viewOrdering('jenis_ipaddress', 'id', 'desc')->result_array();
			$mytypeip = $this->model_corporate->viewOrdering('type_ipaddress', 'id', 'desc')->result_array();
			$myjenistempat = $this->model_corporate->viewOrdering('jenis_tempat', 'id', 'desc')->result_array();
			$mywilayah = $this->model_corporate->viewOrdering('wilayah', 'id', 'desc')->result_array();
			$mystatuskepemilikan = $this->model_corporate->viewOrdering('jenis_kepemilikan', 'id', 'desc')->result_array();
			$mystatuskepemilikanperangkat = $this->model_corporate->viewOrdering('jenis_kepemilikan_perangkat', 'id', 'desc')->result_array();

			$data = array(
				'page_content'      => '../pageadmin/corporate/view',
				'ribbon'            => '<li class="active">Pelanggang Corporate</li>',
				'page_name'         => 'Daftar Pelanggan',
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
			$my_data = $this->model_corporate->viewOrderingCustom()->result_array();
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
				'status'  => $this->input->post('e_status'),
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
				'no_wa'  => $this->input->post('e_telp'),
				'address'  => $this->input->post('e_alamat'),
				'panjang_kabel'  => $this->input->post('e_panjangkabel'),
				'odp'  => $this->input->post('e_odp'),
				'olt'  => $this->input->post('e_olt'),
				'kodp'  => $this->input->post('e_kodp'),
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

		$action = $this->model_corporate->update($data_id, $data, 'customer_corporate');
		echo json_encode($action);
	}

	public function tampil_byid()
	{
		$data = array(
			'id'  => $this->input->post('id'),
		);
		$my_data = $this->model_corporate->view_where('customer_corporate', $data)->result();
		echo json_encode($my_data);
	}

	public function generate()
	{
		$wilayah = $this->input->post('id');
		$kodewilayah = $this->model_corporate->getkodewilayah($wilayah)->row();
		$noreg = $this->db->query("SELECT
		max(no_services) as maxno from customer_corporate")->result_array();
		if (count($noreg) < 1) {
			$no = 'CRP00001';
		} else {
			$no = $noreg[0]['maxno'];
			$urutan =  substr($no, 3, 3);
			print_r($urutan);exit;
		}
		$kodewilayah = $kodewilayah->kode_wilayah;
		$idlayanan = $kodewilayah.$no;
		echo json_encode($idlayanan);
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
					'no_services'  => str_replace('"', " ", $this->input->post('nomor_layanan')),
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
					'no_services'  => str_replace('"', " ", $this->input->post('nomor_layanan')),
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

			$cek = $this->model_corporate->checkDuplicate($data, 'customer_corporate');
			if ($cek > 0) {
				echo json_encode(401);
			} else {
				$action = $this->model_corporate->insert($data, 'customer_corporate');
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
			$action = $this->model_corporate->delete($data_id, 'customer_corporate');
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
			$action = $this->model_corporate->update($data_id, $data, 'customer_corporate');
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
			$action = $this->model_corporate->update($data_id, $data, 'customer_corporate');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
