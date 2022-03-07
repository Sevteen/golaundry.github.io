<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    function select($data)
    {
        $item = array('username'=>$data['username'], 'password'=>md5($data['password']));
        $result = $this->db->get_where('user', $item);
        if($result->num_rows()>0){
            $user = $result->result()[0];
            if($user->jenis=="Admin"){
                $datauser = $this->db->get_where('pegawai', array('iduser'=>$user->iduser))->result_array()[0];
                $datauser['jenis'] = $user->jenis;
                $datauser['isLoggedin'] = true;
                return $datauser;
            }else{
                $datauser = $this->db->get_where('pelanggan', array('iduser'=>$user->iduser))->result_array()[0];
                $datauser['jenis'] = $user->jenis;
                $datauser['isLoggedin'] = true;
                return $datauser;
            }
        }else
            return $result->result();
    }    

    function get_harga($data){
        $this->db->order_by('statusbiaya', 'jenis', 'ASC');
        $this->db->group_by(array('statusbiaya', 'jenis'));
        $result = $this->db->get($data)->result();

        $archive = array();
        if($result){
            foreach($result as $row){
                $archive[$row->statusbiaya][] = $row;
            }
        }
        return $archive;
    }

    function get_order_status($data){
        $item = array('kd_pemesanan'=>$data);
        $result = $this->db->get_where('pemesanan', $item);
        if($result->num_rows()>0){
            $id = $result->result()[0];
            return $id;
        }else{
            return $result->result();
        }
        
    }
}

