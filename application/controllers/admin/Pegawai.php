<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Pegawai_model', 'PegawaiModel');
    }

    function simpan(){
        $data = $this->input->post();
        if($data['iduser']==""){
            $result = $this->PegawaiModel->insert($data);
            if($result){
                $output['status_code'] = 200;
                $output['message'] = 'Data berhasil disimpan';
            }
            else{
                $output['status_code'] = 409;
                $output['message'] = 'Username telah terdaftar';
            }
        }else{
            if($data['password']==""){
                $data = $this->input->post();
                $result = $this->PegawaiModel->update($data, false);
                if($result){
                    $output['status_code'] = 201;
                    $output['message'] = 'Data berhasil diperbarui';
                }
                else{
                    $output['status_code'] = 410;
                    $output['message'] = 'Data gagal diperbarui';
                }
            }else{
                $data = $this->input->post();
                $result = $this->PegawaiModel->update($data, true);
                if($result){
                    $output['status_code'] = 201;
                    $output['message'] = 'Data berhasil diperbarui';
                }
                else{
                    $output['status_code'] = 410;
                    $output['message'] = 'Data gagal diperbarui';
                }
            }

        }

        echo json_encode($output);
    }
    
    function hapus($iduser){
        if($this->PegawaiModel->delete($iduser)){
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
