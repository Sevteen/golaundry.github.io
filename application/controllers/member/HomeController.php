<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Profile_model', 'ProfileModel');
        $this->load->model('admin/Jenis_model', 'JenisModel');
        $this->load->model('User_model', 'UserModel');
        
    }
    
    public function index()
    {
        $title['title'] = ['header'=>'Dashboard', 'dash'=>'Dashboard'];
        $data['data'] = $this->ProfileModel->select();
        $this->load->view('member/layout/header', $title);
        $this->load->view('member/dashboard', $data);
        $this->load->view('member/layout/footer');
    }
    
    public function pemesanan()
    {
        $title['title'] = ['header'=>'Pemesanan', 'dash'=>'Pemesanan'];
        $data['data'] = $this->ProfileModel->select();
        $this->load->view('member/layout/header', $title);
        $this->load->view('member/pemesanan', $data);
        $this->load->view('member/layout/footer');
    }
    
    public function riwayat()
    {
        $title['title'] = ['header'=>'Riwayat', 'dash'=>'Riwayat'];
        $data['data'] = $this->ProfileModel->select();
        $this->load->view('member/layout/header', $title);
        $this->load->view('member/riwayat', $data);
        $this->load->view('member/layout/footer');
    }
    
    public function tarif()
    {
        $title['title'] = ['header'=>'Tarif Laundry', 'dash'=>'Tarif Laundry'];
        $data['data'] = $this->UserModel->get_harga('jenispakaian');
        $this->load->view('member/layout/header', $title);
        $this->load->view('member/tarif', $data);
        $this->load->view('member/layout/footer');
    }

}

/* End of file Home.php */
