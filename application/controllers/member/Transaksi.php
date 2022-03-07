<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('member/Transaksi_model', 'TransaksiModel');
    }

    public function gettransaksi()
    {
        $result = $this->TransaksiModel->select();
        echo json_encode($result);
    }
}

/* End of file Controllername.php */
