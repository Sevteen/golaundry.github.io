<?php

class Pelanggan_model extends CI_Model {
    function select(){
        $this->db->select('user.iduser, user.username, pelanggan.nama, pelanggan.alamat, pelanggan.no_hp, pelanggan.email, pelanggan.jk, pelanggan.iduser');
        $this->db->from('user');
        $this->db->join('pelanggan', 'user.iduser = pelanggan.iduser');
        $result = $this->db->get();
        if($result->num_rows()>0)
            return $result->result();
        else
            return $result->result();
    }

    function insert($data){
        $user = [
            'username'=>$data['username'],
            'password'=>md5($data['password']),
            'jenis' => 'Member'
        ];
        $item = [
            'nama'=>$data['nama'],
            'email'=>$data['email'],
            'alamat'=>$data['alamat'],
            'no_hp'=>$data['no_hp'],
            'jk'=>$data['jk']
        ];
        $result = $this->db->get_where('user', array('username'=>$user['username']));
        if($result->num_rows()>0){
            return false;
        }else{
            $this->db->trans_begin();
            $this->db->insert('user', $user);
            $item['iduser'] = $this->db->insert_id();
            $this->db->insert('pelanggan', $item);

            if($this->db->trans_status()==true){
                $this->db->trans_commit();
                return true;
            }else{
                $this->db->trans_rollback();
                return false;
            }
        }

            
    }

    function update($data, $usingPass){
        if($usingPass){
            $query = 'UPDATE pelanggan JOIN user ON pelanggan.iduser = user.iduser SET pelanggan.nama = "'.$data['nama'].'", pelanggan.alamat = "'.$data['alamat'].'", pelanggan.no_hp = "'.$data['no_hp'].'", pelanggan.email = "'.$data['email'].'",  pelanggan.jk = "'.$data['jk'].'", user.password = "'.md5($data['password']).'" WHERE  user.iduser = "'.$data['iduser'].'" AND pelanggan.iduser = "'.$data['iduser'].'"';

        }else{
            $query = 'UPDATE pelanggan JOIN user ON pelanggan.iduser = user.iduser SET pelanggan.nama = "'.$data['nama'].'", pelanggan.alamat = "'.$data['alamat'].'", pelanggan.no_hp = "'.$data['no_hp'].'", pelanggan.email = "'.$data['email'].'",  pelanggan.jk = "'.$data['jk'].'" WHERE user.iduser = "'.$data['iduser'].'" AND pelanggan.iduser = "'.$data['iduser'].'"';

        }
        if($this->db->query($query))
            return true;
        else
            return false;
    }

    function delete($iduser){
        if($this->db->delete('pelanggan', array('iduser'=>$iduser)) && $this->db->delete('user', array('iduser'=>$iduser)))
            return true;
        else
            return false;
    }    
}

/* End of file ModelName.php */
