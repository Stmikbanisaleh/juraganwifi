<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Laporanpembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('administrator/Model_laporanpembayaran');
    }

    function render_view($data)
    {
        $this->template->load('templateadmin', $data); //Display Page
    }

    public function index()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
            $data = array(
                'page_content'      => '../pageadmin/laporanpembayaran/view',
                'ribbon'            => '<li class="active">Cetak Laporan Pembayaran</li>',
                'page_name'         => 'Laporan Pembayaran',
            );
            $this->render_view($data); //Memanggil function render_view
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }

    public function laporanpembayaran()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
            $awal = $this->input->post('awal');
            $akhir = $this->input->post('akhir');
            $filename = "Laporan_pembayaran_periode-$awal sampai $akhir.xlsx";
            $data = $this->Model_laporanpembayaran->getAllStatus($awal, $akhir)->result_array();
            if ($data != null) {
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1', 'No');
                $sheet->setCellValue('B1', 'No Invoice');
                $sheet->setCellValue('C1', 'No Pelanggan');
                $sheet->setCellValue('D1', 'Nama Pelanggan');
                $sheet->setCellValue('E1', 'Nomor Telp');
                $sheet->setCellValue('F1', 'Layanan');
                $sheet->setCellValue('G1', 'Bulan Ke');
                $sheet->setCellValue('H1', 'Tahun');
                $sheet->setCellValue('I1', 'Nominal Tagihan');
                $sheet->setCellValue('J1', 'Nominal Bayar');
                $sheet->setCellValue('K1', 'Metode Pembayaran');

                $sheet->setCellValue('L1', 'Tanggal Pembayaran');

                $no = 1;
                $x = 2;
                foreach ($data as $value) {
                    $sheet->setCellValue('A' . $x, $no++);
                    $sheet->setCellValue('B' . $x, $value['invoice']);
                    $sheet->setCellValue('C' . $x, $value['no_services']);
                    $sheet->setCellValue('D' . $x, $value['name']);
                    $sheet->setCellValue('E' . $x, $value['no_wa']);
                    $sheet->setCellValue('F' . $x, $value['nama_layanan']);
                    $sheet->setCellValue('G' . $x, $value['month']);
                    $sheet->setCellValue('H' . $x, $value['year']);
                    $sheet->setCellValue('I' . $x, $value['Nominal']);
                    $sheet->setCellValue('J' . $x, $value['Nominal_bayar']);
                    $sheet->setCellValue('K' . $x, $value['metode_pembayaran']);
					$sheet->setCellValue('L' . $x, $value['tgl_bayar']);
                    $x++;
                }

                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename=' . $filename . '');
                header('Cache-Control: max-age=0');

                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
            } else {
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="GeneratedFile.xlsx"');
                header('Cache-Control: max-age=0');

                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
            }
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }
}
