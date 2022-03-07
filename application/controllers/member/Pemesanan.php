<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('member/Pemesanan_model', 'PemesananModel');
    }

    public function simpan(){
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);      
        $result = $this->PemesananModel->insert($data);
        if ($result) {
            $output['status_code'] = '200';
            $output['message'] = 'Data berhasil dihapus';
        } else {
            $output['status_code'] = '500';
            $output['message'] = 'Data gagal dihapus';
        }

         echo json_encode($output);
    }

    public function getData(Type $var = null){
        $this->load->model('admin/Jenis_model', 'JenisModel');
        echo json_encode(array('jenis'=>$this->JenisModel->select(), 'data'=>$this->PemesananModel->select()) );
    }

    public function hapus($kd_pemesanan){
        if ($this->PemesananModel->delete($kd_pemesanan)) {
            $output['status_code'] = '200';
            $output['message'] = 'Data berhasil dihapus';
        } else {
            $output['status_code'] = '500';
            $output['message'] = 'Data gagal dihapus';
        }

         echo json_encode($output);
    }
}

