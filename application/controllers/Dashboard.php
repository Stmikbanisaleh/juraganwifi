<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('administrator/model_dashboard');
    }

    function render_view($data)
    {
        $this->template->load('templateadmin', $data); //Display Page
    }

    public function index()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
            $tahun = $this->input->post('tahun');
            if(isset($tahun)){
                $tahun = $this->input->post('tahun');
            } else {
                $tahun =date("Y");
            }
            $latestpayment = $this->db->query("select   CONCAT('Rp. ',FORMAT(a.nominal_bayar,2)) nominal, DATE_FORMAT(a.updatedAt,'%d-%M-%Y') as tgl_pembayaran, b.name as nama_pelanggan
            ,d.name as nama_layanan , a.metode_pembayaran from invoice a
            join customer b on a.no_services = b.no_services
            join invoice_detail c on a.id = c.invoice_id
            join package_item d on c.item_id = d.id where a.status != 0 order by a.updatedAt desc limit 10 ")->result_array();
			//customer normal
            $totalcustomer = $this->db->query("select count(id) as total from customer where status = 1 ")->result_array();
            $totalcustomer2 = $this->db->query("select count(id) as total from customer where status = 0 ")->result_array();
			//customer corporate
			$totalcustomercorporate = $this->db->query("select count(id) as total from customer_corporate where status = 1 ")->result_array();
            $totalcustomercorporate2 = $this->db->query("select count(id) as total from customer_corporate where status = 0 ")->result_array();

            $gsm = $this->db->query("select count(id) as total from pengguna_gsm where status = 1 ")->result_array();
            $gsm2 = $this->db->query("select count(id) as total from pengguna_gsm where status = 0 ")->result_array();


            $totalcustomer3 = $this->db->query("select count(id) as total from data_pelanggan_voip where status = 1")->result_array();
            $totalcustomer4 = $this->db->query("select count(id) as total from data_pelanggan_voip where status = 0")->result_array();

			$datamidi = $this->db->query("select count(id) as total from datamidi where status = 1")->result_array();
            $datamidi2 = $this->db->query("select count(id) as total from datamidi where status = 0")->result_array();

            $inet = $this->db->query("select count(id) as total from inet where status = 1")->result_array();
            $inet2 = $this->db->query("select count(id) as total from inet where status = 0")->result_array();
            $inventori = $this->db->query("select count(id) as total from data_inventori ")->result_array();
            $zona = $this->db->query("select count(id) as total from wilayah ")->result_array();
            $vendordetail = $this->db->query("select count(id) as total from vendor_detail ")->result_array();

            $totalpendapatan = $this->db->query("select CONCAT('Rp. ',FORMAT(sum(nominal_bayar),2)) total from invoice_detail a where year(a.updatedAt) = '$tahun' ")->result_array();
            $totalpendapatan =  $totalpendapatan[0];
            $datainv = $inventori[0];
            $inet =  $inet[0];
            $inet2 =  $inet2[0];
            $totalcustomer = $totalcustomer[0];
            $totalcustomer2 =  $totalcustomer2[0];
            $totalcustomer3 = $totalcustomer3[0];
            $totalcustomer4 = $totalcustomer4[0];

            $harga = array();
            $bulan = array();
            $mygraph = $this->db->query("select sum(a.nominal_bayar) as harga, monthname(a.updatedAt) as bulan
             from invoice a where year(a.updatedAt) = '$tahun' group by monthname(a.updatedAt) ORDER by month(a.updatedAt) ")->result_array();
            foreach ($mygraph as $row) {
                if ($row['harga'] == null) {
                    array_push($harga, 0);
                } else {
                    array_push($harga, $row['harga']);
                }

                if ($row['bulan'] == null) {
                    array_push($bulan, 0);
                } else {
                    array_push($bulan, $row['bulan']);
                }
            }

            $data = array(
                'page_content'      => '../pageadmin/dashboard',
                'ribbon'            => '<li class="active">Dashboard</li>',
                'page_name'         => 'Dashboard',
                'customer'          => $totalcustomer['total'],
                'customer2'         => $totalcustomer2['total'],
                'customer3'         => $totalcustomer3['total'],
                'customer4'         => $totalcustomer4['total'],

				'customercorporate'			=> $totalcustomercorporate[0]['total'],
				'customercorporate2'			=> $totalcustomercorporate2[0]['total'],
                'inet'         => $inet['total'],
                'inet2'         => $inet2['total'],
                'datainv'       => $datainv['total'],
				'gsm'		=> $gsm[0]['total'],
				'gsm2'		=> $gsm2[0]['total'],
				'datamidi'		=> $datamidi[0]['total'],
				'datamidi2'		=> $datamidi2[0]['total'],
                'bulan' => $bulan,
                'harga' => $harga,
				'vendor' => $vendordetail[0]['total'],
				'zona' => $zona[0]['total'],
                'totalpendapatan' =>  $totalpendapatan['total'],
                'lastestpayment' =>  $latestpayment
            );
            $this->render_view($data); //Memanggil function render_view
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $password = hash("sha512", $password);
        $result = $this->model_dashboard->checkLogin($email, $password);
        if ($result->num_rows() > 0) {
            $data = $result->result_array();
            foreach ($data as $value) {
                if ($value['is_active'] != 1) {
                    $this->session->set_flashdata('category_error', 'Akun tersebut belum diaktifkan');
                    redirect('dashboard/index');
                }
                $data = [
                    'email' => $value['email'],
                    'name' => $value['name'],
                    'image' => $value['image'],
                    'level' => $value['level'],
                    'last_login' => $value['last_login'],
                ];
            }
            $this->session->set_userdata($data);
            redirect('dashboard/index');
        } else {
            $this->session->set_flashdata('category_error', 'Email atau password Password');
            redirect('dashboard/index');
        }
    }

    public function updatepassword()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
            $data_id = array(
                'email'  => $this->session->userdata('email')
            );
            $password = md5($this->input->post('password'));
            $password = hash("sha512", $password);

            $password2 = md5($this->input->post('passwordconfirm'));
            $password2 = hash("sha512", $password2);
            if ($password == $password2) {

                $data = array(
                    'password'  => $password,
                    'updatedAt' => date('Y-m-d H:i:s'),
                    'updatedBy' => $this->session->userdata('name'),
                );
                $action = $this->model_dashboard->update($data_id, $data, 'user');
                echo json_encode($action);
            } else {
                echo json_encode(400);
            }
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }

    public function notification()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
            if ($this->input->post('view') != '') {
                $this->db->query("UPDATE status_log SET is_read = 1 WHERE is_read = 0");
            }
            $data = $this->db->query("Select a.*,b.airwaybill  from status_log a join pengiriman b on a.id_pengiriman = b.id order by a.createdAt desc limit 10")->result_array();
            $output = '';
            $status = '';

            if ($data != null) {
                foreach ($data as $value) {
                    if ($value['status'] == 0) {
                        $text = "No Airway Bill <b>" . $value['airwaybill'] . "</b> <br>Pengiriman Sedang di Packing ";
                    } else if ($value['status'] == 1) {
                        $text = "No Airway Bill  <b>" . $value['airwaybill'] . "</b> <br> Pengiriman Sedang di Dalam Perjalanan ";
                    } else {
                        $text = "No Airway Bill  <b>" . $value['airwaybill'] . "</b> <br> Pengiriman Telah Sampai ";
                    }
                    $output .= '
				<div class="dropdown-divider"></div>
				<a href=' . base_url() . "administrator/pengiriman/detail?id=$value[id_pengiriman]" . ' class="dropdown-item">
					<i>' . $text . '</i> 
				</a>';
                }
            } else {
                $output .= '
				<li><a href="#" class="text-bold text-italic">Notification Not Found</a></li>';
            }
            $count = $this->db->query("select count(id) as count from status_log where is_read = 0")->result_array();
            $data = array(
                'notification' => $output,
                'unseen_notification'  => $count[0]['count']
            );
            echo json_encode($data);
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard/index');
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('category_error', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!</div>');
            redirect('modulakasir/dashboard');
        } else {
            $email = $this->input->post('email');

            $guru = $this->db->get_where('tbpengawas', ['email' => $email, 'isdeleted' => 0])->row_array();
            if (count($guru) > 0) {
                $token = $this->_token();
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $insert = $this->model_dashboard->insert($user_token, 'msusertoken');
                $ngimail = $this->_send_email($token, 'forgot');
                $this->session->set_flashdata('category_success', '<div class="alert alert-success" role="alert">
            Periksa email untuk reset password!</div>');
                redirect('modulkasir/dashboard');
            } else {
                $this->session->set_flashdata('category_error', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!</div>');
                redirect('modulakasir/dashboard');
            }
        }
    }

    private function _send_email($token, $type)
    {
        require 'assets/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = HOST_EMAIL;
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL_BANTUAN;
        $mail->Password = PASSWORD_BANTUAN;
        $mail->SMTPSecure = 'tls';
        $mail->Port = EMAIL_PORT;
        $mail->setFrom(EMAIL_BANTUAN);
        // Menambahkan penerima
        $mail->addAddress($this->input->post('email'));
        if ($type == 'forgot') {
            // Subjek email
            $mail->Subject = 'School Gemanurani  - Reset Password';
            // Mengatur format email ke HTML
            $mail->isHTML(true);
            // Konten/isi email
            $mailContent = 'Klik untuk reset password akun anda : <a href="' . base_url() . 'modulkasir/dashboard/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>';
            $mail->Body = $mailContent;
        }

        // Kirim email
        if (!$mail->send()) {
            $pes = 'Pesan tidak dapat dikirim.';
            $mai = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $pes = 'Pesan telah terkirim';
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('tbpengawas', ['email' => $email])->row_array();
        if (count($user) > 0) {
            $token = ['token' => $token];
            $user_token = $this->db->query("select token from msusertoken where email ='" . $email . "'")->result_array();
            if ($user_token[0]) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('category_error', '<div class="alert alert-danger" role="alert">
            Reset password gagal,token salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('category_error', '<div class="alert alert-danger" role="alert">
            Reset password gagal,Email salah</div>');
            redirect('auth');
        }
    }

    public function changepassword()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Ulang', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('pagekasir/changepassword');
        } else {
            $password = hash('sha512', md5($this->input->post('password1')));
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password);
            $this->db->set('updatedAt', date('Y-m-d'));
            $this->db->where('email', $email);
            $this->db->update('tbpengawas');
            // print_r($this->db->last_query());exit;
            $this->db->query("delete from msusertoken where email = '" . $email . "'");
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('category_change', '<div class="alert alert-success" role="alert">
            Password telah diubah,silahkan Login</div>');
            redirect('modulkasir/dashboard/login');
        }
    }

    private function _token($length = 12)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str  .= $characters[$rand];
        }
        return $str;
    }
}
