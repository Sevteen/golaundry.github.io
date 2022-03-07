<?php

class Pemesanan_model extends CI_Model {
    function select(){
        $query = $this->db->query("SELECT
                `pemesanan`.`id`,
                `pemesanan`.`kd_pemesanan`,
                `pemesanan`.`tgl_pemesanan`,
                `pemesanan`.`pick_up_delivery`,
                `pemesanan`.`kd_pelanggan`,
                `pemesanan`.`status`,
                `pemesanan`.`update_at`,
                `pelanggan`.`nama`,
                `pelanggan`.`email`,
                `pelanggan`.`alamat`,
                `pelanggan`.`no_hp`,
                `pelanggan`.`jk`
            FROM
                `pelanggan`
                LEFT JOIN `pemesanan` ON `pemesanan`.`kd_pelanggan` =
                `pelanggan`.`kd_pelanggan`
            WHERE
                status NOT IN ('Selesai', 'Batal') ORDER BY kd_pemesanan DESC");
        $data = $query->result();
        return $data;
    }
    
    function update($data){
        $item = [
            'status'=>$data['status'],
            'update_at'=> date("Y-m-d H:i:s")
        ];
        $this->db->where('kd_pemesanan', $data['kd_pemesanan']);
        if($this->db->update('pemesanan', $item))
            return true;
        else
            return false;
    }

}