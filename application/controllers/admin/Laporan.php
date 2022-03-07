<?php

defined('BASEPATH') or exit('No direct script access allowed');

class laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Transaksi_model', 'TransaksiModel');
    }

    public function CetakPDF()
    {
        $this->load->library('mypdf');
        $view = "admin/cetaklaporan";
        $data = $this->TransaksiModel->select();
        $this->mypdf->generate($view,$data);
    }
    public function getprint()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->TransaksiModel->AmbilLaporan($data);
        echo json_encode($result);
    }
}

/* End of file Controllername.php */