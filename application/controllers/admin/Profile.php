<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Profile_model', 'ProfileModel');        
    }
    
    function simpan()
    {
        $data = $this->input->post();
        $result =  $this->ProfileModel->insert($data);
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
    public function getprofile()
    {
        $data = $this->ProfileModel->select();
        echo json_encode($data);
    }

}

/* End of file Profile.php */

