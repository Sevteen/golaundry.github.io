<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Pemesanan_model', 'PemesananModel');
    }

    public function ubah(){
        $data = $this->input->post();
        $result = $this->PemesananModel->update($data);
        if($result){
            $output['status_code'] = 200;
            $output['message'] = 'Data berhasil diperbarui';
        }
        else{
            $output['status_code'] = 404;
            $output['message'] = 'Data gagal diperbarui';
        }

        echo json_encode($output);
    }
}
