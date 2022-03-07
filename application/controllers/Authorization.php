<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Authorization extends CI_Controller
{
    var $folder = 'home/';
    var $layout = 'home/layout';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'UserModel');
        $this->load->model('admin/Pelanggan_model', 'PelangganModel');
    }
    
    public function index()
    {
        $title['title'] = ['header' => 'User Authorization', 'dash' => 'User_authorization'];
        if($this->session->userdata('jenis')=='Admin'){
            redirect(base_url('dashboard'));
        }elseif ($this->session->userdata('jenis')=='Member') {
            redirect(base_url('member/dashboard'));
        }else{
            redirect(base_url());
        }
    }

    public function login()
    {
        $data = $this->input->post();
        $result = $this->UserModel->select($data); 
        if($result){
            $this->session->set_userdata($result);
            if($result['jenis']=="Admin"){
                $output['status_code'] = 200;
                $output['title'] = "Sukses";
                $output['type'] = "success";
                $output['message'] = "Anda berhasil login sebagai admin";
                // redirect('admin/home');
            }else{
                $output['status_code'] = 200;
                $output['title'] = "Sukses";
                $output['type'] = "success";
                $output['message'] = "Anda berhasil login sebagai member";
                // redirect('member/home');
            }
        }else{
            $output['status_code'] = 400;
            $output['title'] = "Gagal";
            $output['type'] = "error";
            $output['message'] = "Error, username atau password salah";
        }
        echo json_encode($output);
        // if (count($result)==0) {
        //     $this->session->set_flashdata('pesan', 'Gagal Login, error');
        //     redirect('authorization');
        // } else {
        //     $this->session->set_userdata($result);
        //     if($result['jenis']=="Admin")
        //         redirect('admin/home');
        //     else
        //         redirect('member/home');
        // }
    }

    // public function registrasi()
    // {
    //     $title['title'] = ['header' => 'User Registration', 'dash' => 'User_registrasi'];
    //     $this->load->view('registrasi', $title);
    // }

    public function signup(){
        $data = $this->input->post();
        $result = $this->PelangganModel->insert($data);
        if($result){
            $output['status_code'] = 200;
            $output['title'] = "Sukses";
            $output['type'] = "success";
            $output['message'] = "Akun Laundry Anda telah terdaftar Terima kasih telah membuat akun GoLaundry.";
        }else{
            $output['status_code'] = 409;
            $output['title'] = "Gagal";
            $output['type'] = "error";
            $output['message'] = "Error, username sudah terdaftar";
        }
        echo json_encode($output);

            // redirect('authorization');
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(''));
    }
}

/* End of file Controllername.php */
