<?php

class Jenis_model extends CI_Model {
    function select(){
        $result = $this->db->get('jenispakaian');
        if($result->num_rows()>0)
            return $result->result();
        else
            return $result->result();
    }

    function insert($data){
        $item = [
            'jenis'=>$data['jenis'],
            'harga'=>$data['harga'],
            'statusbiaya'=>$data['jb']
        ];
        if($this->db->insert('jenispakaian', $item))
            return true;
        else
            return false;
    }

    function update($data){
        $item = [
            'jenis'=>$data['jenis'],
            'harga'=>$data['harga'],
            'statusbiaya'=>$data['jb']
        ];
        $this->db->where('idjenispakaian', $data['idjenispakaian']);
        if($this->db->update('jenispakaian', $item))
            return true;
        else
            return false;
    }

    function delete($id){
        $this->db->where('idjenispakaian', $id);
        if($this->db->delete('jenispakaian'))
            return true;
        else
            return false;
    }    
}

/* End of file ModelName.php */
