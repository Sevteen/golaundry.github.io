<?php

class Pegawai_model extends CI_Model {
    function select(){
        $this->db->select('user.iduser, pegawai.iduser, pegawai.kd_pegawai, pegawai.bagian, pegawai.nama_pegawai, user.username');
        $this->db->from('pegawai');
        $this->db->join('user', 'user.iduser = pegawai.iduser');
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
            'jenis' => 'Admin'
        ];
        $item = [
            'nama_pegawai'=>$data['nama_pegawai'],
            'bagian'=>$data['bagian']
        ];
        $result = $this->db->get_where('user', array('username'=>$user['username']));
        if($result->num_rows()>0){
            return false;
        }else{
            $this->db->trans_begin();
            $this->db->insert('user', $user);
            $item['iduser'] = $this->db->insert_id();
            $this->db->insert('pegawai', $item);
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
        // $item = [
        //     'nama_pegawai'=>$data['nama_pegawai'],
        //     'bagian'=>$data['bagian']
        // ];
        if($usingPass){
            $query = 'UPDATE pegawai JOIN user ON pegawai.iduser = user.iduser SET pegawai.nama_pegawai = "'.$data['nama_pegawai'].'", pegawai.bagian = "'.$data['bagian'].'", user.password = "'.md5($data['password']).'" WHERE  user.iduser = "'.$data['iduser'].'" AND pegawai.iduser = "'.$data['iduser'].'"';

        }else{
            $query = 'UPDATE pegawai JOIN user ON pegawai.iduser = user.iduser SET pegawai.nama_pegawai = "'.$data['nama_pegawai'].'", pegawai.bagian = "'.$data['bagian'].'" WHERE user.iduser = "'.$data['iduser'].'" AND pegawai.iduser = "'.$data['iduser'].'"';

        }
        // $this->db->join('user', 'user.iduser = pegawai.iduser');
        // $this->db->set($item);
        // $this->db->where('iduser', $data['iduser']);
        if($this->db->query($query))
            return true;
        else
            return false;
    }

    function delete($iduser){
        if($this->db->delete('pegawai', array('iduser'=>$iduser)) && $this->db->delete('user', array('iduser'=>$iduser)))
            return true;
        else
            return false;
    }    
}

/* End of file ModelName.php */
