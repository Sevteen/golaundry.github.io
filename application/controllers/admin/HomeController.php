<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Transaksi_model', 'TransaksiModel');
        $this->load->model('admin/Pelanggan_model', 'PelangganModel');
        $this->load->model('admin/Pegawai_model', 'PegawaiModel');
        $this->load->model('admin/Jenis_model', 'JenisModel');
        $this->load->model('admin/Pemesanan_model', 'PemesananModel');
        $this->load->model('admin/Profile_model', 'ProfileModel');
    }
    
    public function index(){
        $year = $this->input->get('year');
        if($year == ''){
            $year = date("Y");
        }
        $title['title'] = ['header'=>'Dashboard', 'dash'=>'Dashboard'];
        $data['data'] = ['transaksi'=>$this->TransaksiModel->select(), 
                        'member'=>$this->PelangganModel->select(), 
                        'pendapatan'=>$this->TransaksiModel->get_pendapatan($year),
                        'total_transaksi_selesai'=>$this->TransaksiModel->total_transaksi_selesai($year),
                        'total_pendapatan'=>$this->TransaksiModel->total_pendapatan($year),
                        'latest_order'=>$this->TransaksiModel->latest_order(),
                        'year'=>$year,
                        'rangking'=> $this->TransaksiModel->get_rangking($year)];
        $this->load->view('admin/layout/header', $title);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }

    public function profile() {
        $title['title'] = ['header'=>'Profile', 'dash'=>'Profile'];
        $data['data'] = $this->ProfileModel->select();
        $this->load->view('admin/layout/header', $title);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/layout/footer');
    }

    public function pegawai() {
        $title['title'] = ['header'=>'Pegawai', 'dash'=>'Pegawai'];
        $data['data'] = $this->PegawaiModel->select();
        $this->load->view('admin/layout/header', $title);
        $this->load->view('admin/pegawai', $data);
        $this->load->view('admin/layout/footer');
    }

    public function pelanggan() {
        $title['title'] = ['header'=>'Pelanggan', 'dash'=>'Pelanggan'];
        $data['data'] = $this->PelangganModel->select();
        $this->load->view('admin/layout/header', $title);
        $this->load->view('admin/pelanggan', $data);
        $this->load->view('admin/layout/footer');
    }

    public function daftarharga() {
        $title['title'] = ['header'=>'Daftar Harga', 'dash'=>'Daftar Harga'];
        $data['data'] = $this->JenisModel->select();
        $this->load->view('admin/layout/header', $title);
        $this->load->view('admin/daftarharga', $data);
        $this->load->view('admin/layout/footer');
    }

    public function pemesanan() {
        $title['title'] = ['header'=>'Pesanan', 'dash'=>'Pesanan'];
        $data['data'] = $this->PemesananModel->select();
        $this->load->view('admin/layout/header', $title);
        $this->load->view('admin/pemesanan', $data);
        $this->load->view('admin/layout/footer');
    }

    public function pembayaran() {
        $title['title'] = ['header'=>'Pembayaran', 'dash'=>'Pembayaran'];
        $this->load->view('admin/layout/header', $title);
        $this->load->view('admin/pembayaran');
        $this->load->view('admin/layout/footer');
    }

    public function riwayat() {
        $title['title'] = ['header'=>'Riwayat', 'dash'=>'Riwayat'];
        $data['data'] = $this->TransaksiModel->select();
        $this->load->view('admin/layout/header', $title);
        $this->load->view('admin/riwayat', $data);
        $this->load->view('admin/layout/footer');
    }

    public function laporan() {
        $title['title'] = ['header'=>'Laporan', 'dash'=>'Laporan'];
        $this->load->view('admin/layout/header', $title);
        $this->load->view('admin/laporan');
        $this->load->view('admin/layout/footer');
    }

}

/* End of file Home.php */
