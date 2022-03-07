<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Jenis_model', 'JenisModel');
    }

    function simpan(){
        $data = $this->input->post();
        if($data['idjenispakaian']==""){
            $result = $this->JenisModel->insert($data);
            if($result){
                $output['status_code'] = 200;
                $output['message'] = 'Data berhasil disimpan';
            }
            else{
                $output['status_code'] = 404;
                $output['message'] = 'Data gagal disimpan';
            }
        }else{
            $data = $this->input->post();
            $result = $this->JenisModel->update($data, false);
            if($result){
                $output['status_code'] = 200;
                $output['message'] = 'Data berhasil diperbarui';
            }
            else{
                $output['status_code'] = 404;
                $output['message'] = 'Data gagal diperbarui';
            }
        }

        echo json_encode($output);
    }

    function hapus($id){
        if($this->JenisModel->delete($id)){
            $output['status_code'] = '200';
            $output['message'] = 'Data berhasil dihapus';
        }else{
            $output['status_code'] = '500';
            $output['message'] = 'Data gagal dihapus';
        }
        echo json_encode($output);
    }
}

/* End of file Controllername.php */
