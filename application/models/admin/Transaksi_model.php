<?php

class Transaksi_model extends CI_Model {
    public function AmbilLaporan($tanggal){
        $tglawal = $tanggal['tglawal'];
        $tglakhir = $tanggal['tglakhir'];
        $query = $this->db->query("SELECT
            `pemesanan`.`kd_pemesanan`,
            `pemesanan`.`tgl_pemesanan`,
            `pemesanan`.`kd_pelanggan`,
            `pemesanan`.`status`,
            `transaksi`.`id_pemesanan`,
            `transaksi`.`kd_transaksi`,
            `transaksi`.`kd_pegawai`,
            `transaksi`.`tgl_ambil`,
            `transaksi`.`total`,
            `pelanggan`.`nama`,
            `pelanggan`.`kd_pelanggan` AS `kd_pelanggan1`,
            `pelanggan`.`alamat`,
            `pelanggan`.`no_hp`,
            `pelanggan`.`jk`,
            `pelanggan`.`iduser`
        FROM
            `transaksi`
            LEFT JOIN `pemesanan` ON `pemesanan`.`id` = `transaksi`.`id_pemesanan`
            LEFT JOIN `pelanggan` ON `pelanggan`.`kd_pelanggan` =
            `pemesanan`.`kd_pelanggan`
        WHERE tgl_ambil >= '$tglawal' AND tgl_ambil<='$tglakhir'");
        $transaksi = $query->result();
        foreach ($transaksi as $key => $value) {
            $detail = $this->db->query("SELECT
                `detail`.*,
                `jenispakaian`.`jenis`,
                `jenispakaian`.`harga`,
                `jenispakaian`.`statusbiaya`
            FROM
                `detail`
                LEFT JOIN `jenispakaian` ON `jenispakaian`.`idjenispakaian` =
                `detail`.`idjenispakaian` WHERE kd_transaksi = $value->kd_transaksi");
            $value->detail = $detail->result();
        }
        return $transaksi;
    }

    function get_rangking($year){
        $query = $this->db->query("SELECT 
            `pemesanan`.`kd_pelanggan`, 
            `pemesanan`.`status`, 
            SUM(`transaksi`.`total`) as total, 
            COUNT(`transaksi`.`total`) AS total_count, 
            `pelanggan`.`nama` 
        FROM `transaksi` 
            LEFT JOIN `pemesanan` ON `pemesanan`.`id` = `transaksi`.`id_pemesanan` 
            LEFT JOIN `pelanggan` ON `pelanggan`.`kd_pelanggan` = `pemesanan`.`kd_pelanggan` 
        WHERE YEAR(transaksi.tgl_ambil) = '$year'
        GROUP BY `pemesanan`.`kd_pelanggan` 
        ORDER BY transaksi.total ASC
        LIMIT 5"
        );
        return $query->result_array();
    }

    function latest_order(){
        $query = $this->db->query('SELECT 
            `pemesanan`.`kd_pelanggan`, 
            `pemesanan`.`kd_pemesanan`, 
            `pemesanan`.`tgl_pemesanan`, 
            `pemesanan`.`status`, 
            `pelanggan`.`nama` 
            FROM `transaksi` 
                LEFT JOIN `pemesanan` ON `pemesanan`.`id` = `transaksi`.`id_pemesanan` 
                LEFT JOIN `pelanggan` ON `pelanggan`.`kd_pelanggan` = `pemesanan`.`kd_pelanggan` 
            GROUP BY `pemesanan`.`kd_pemesanan` DESC');
        return $query->result_array();
    }

    function get_pendapatan($year){
        if($year == ''){
            $year = date("Y");
        }
        $query = $this->db->query('SELECT 
            SUM(IF(MONTH(tgl_ambil) = 1 , total,0)) as Jan,
            SUM(IF(MONTH(tgl_ambil) = 2 , total,0)) as Feb,
            SUM(IF(MONTH(tgl_ambil) = 3 , total,0)) as Mar,
            SUM(IF(MONTH(tgl_ambil) = 4 , total,0)) as Apr,
            SUM(IF(MONTH(tgl_ambil) = 5 , total,0)) as May,
            SUM(IF(MONTH(tgl_ambil) = 6 , total,0)) as Jun,
            SUM(IF(MONTH(tgl_ambil) = 7 , total,0)) as Jul,
            SUM(IF(MONTH(tgl_ambil) = 8 , total,0)) as Aug,
            SUM(IF(MONTH(tgl_ambil) = 9 , total,0)) as Sep,
            SUM(IF(MONTH(tgl_ambil) = 10, total,0)) as Oct,
            SUM(IF(MONTH(tgl_ambil) = 11, total,0)) as Nov,
            SUM(IF(MONTH(tgl_ambil) = 12, total,0)) as `Dec`
        FROM transaksi WHERE YEAR(tgl_ambil) = '.$year.''
        );

        return $result = $query->result_array();
    }

    function total_pendapatan($year){
        if($year ==''){
            $year = date("Y");
        }
        $query = $this->db->query('SELECT 
        SUM(total) as TotalPendapatan
        FROM transaksi WHERE YEAR(tgl_ambil) = '.$year.''
        );

        return $result = $query->result_array();
    }

    function total_transaksi_selesai($year){
        if($year ==''){
            $year = date("Y");
        }
        $query = $this->db->query('SELECT * FROM `transaksi` WHERE YEAR(tgl_ambil) = '.$year.'');

        return $result = $query->result_array();
    }

    function select(){
        $query = $this->db->query("SELECT
            `pemesanan`.`kd_pemesanan`,
            `pemesanan`.`tgl_pemesanan`,
            `pemesanan`.`kd_pelanggan`,
            `pemesanan`.`status`,
            `transaksi`.`id_pemesanan`,
            `transaksi`.`kd_transaksi`,
            `transaksi`.`kd_pegawai`,
            `transaksi`.`tgl_ambil`,
            `transaksi`.`total`,
            `pelanggan`.`nama`,
            `pelanggan`.`kd_pelanggan` AS `kd_pelanggan1`,
            `pelanggan`.`alamat`,
            `pelanggan`.`no_hp`,
            `pelanggan`.`jk`,
            `pelanggan`.`iduser`
        FROM
            `transaksi`
            LEFT JOIN `pemesanan` ON `pemesanan`.`id` = `transaksi`.`id_pemesanan`
            LEFT JOIN `pelanggan` ON `pelanggan`.`kd_pelanggan` =
            `pemesanan`.`kd_pelanggan`");
        $transaksi = $query->result();
        foreach ($transaksi as $key => $value) {
            $query= $this->db->query("SELECT
                `detail`.*,
                `jenispakaian`.`jenis`,
                `jenispakaian`.`harga`,
                `jenispakaian`.`statusbiaya`
            FROM
                `detail`
                LEFT JOIN `jenispakaian` ON `detail`.`idjenispakaian` =
            `jenispakaian`.`idjenispakaian` WHERE kd_transaksi='$value->kd_transaksi'");
            $value->jenis = $query->result();
        }
        $data['transaksi']= $transaksi;

        $query= $this->db->query("SELECT
            `pemesanan`.*
        FROM
            `pemesanan`
            LEFT JOIN `transaksi` ON `transaksi`.`id_pemesanan` = `pemesanan`.`id`
        WHERE
            `transaksi`.`id_pemesanan` IS NULL AND pemesanan.status NOT IN('Selesai','Batal')");
        $data['pemesanan']= $query->result();
        
        foreach ($data['pemesanan'] as $key => $value) {
            $result = $this->db->query("SELECT
                `jenispakaian`.`jenis`,
                `jenispakaian`.`harga`,
                `jenispakaian`.`statusbiaya`,
                `detailpemesanan`.`pemesanan_id`,
                `detailpemesanan`.`idjenispakaian`,
                `detailpemesanan`.`jumlah`
            FROM
                `jenispakaian`
                RIGHT JOIN `detailpemesanan` ON `jenispakaian`.`idjenispakaian` =
                `detailpemesanan`.`idjenispakaian`
            WHERE `detailpemesanan`.`pemesanan_id` = $value->id");
            $value->detail = $result->result();
        }
        $query= $this->db->get('jenispakaian');
        $data['jenis']= $query->result();
        return $data;
    }

    public function insert($data)
    {
        $itemtrans = [
            'id_pemesanan'=>$data['id_pemesanan']['id'],
            'kd_pegawai'=>$this->session->userdata('kd_pegawai'),
            'tgl_ambil'=>$data['tgl_ambil'],
            'total'=>$data['total'],
        ];
        $itempem = [
            'status'=>'Selesai'
        ];
        $this->db->trans_begin();

        $this->db->insert('transaksi', $itemtrans);
        $kd_transaksi = $this->db->insert_id();
        foreach ($data['jenis'] as $key => $value) {
            $itemdetail = [
                'idjenispakaian'=>$value['idjenispakaian'],
                'kd_transaksi'=>$kd_transaksi,
                'berat'=>$value['berat'],
                'biayaambil'=>$value['biayaambil'],
                'biayaantar'=>$value['biayaantar'],
                'jumlah'=>$value['jumlah'],
                'bayar'=>$value['bayar']
            ];
            $this->db->insert('detail', $itemdetail);
        }

        $this->db->where('id', $data['id_pemesanan']['id']);
        $this->db->update('pemesanan', $itempem);
        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return true;
        }else{
            $this->db->trans_rollback();
            return false;
        }
    }

    public function update($data)
    {
        $itemtrans = [
            'id_pemesanan'=>$data['id_pemesanan'],
            'kd_pegawai'=>$this->session->userdata('kd_pegawai'),
            'tgl_ambil'=>$data['tgl_ambil'],
            'total'=>$data['total'],
        ];
        $this->db->where('kd_transaksi', $data['kd_transaksi']);
        $result = $this->db->update('transaksi', $itemtrans);
        foreach ($data['jenis'] as $key => $value) {
            $itemdetail = [
                'idjenispakaian'=>$value['idjenispakaian'],
                'kd_transaksi'=>$value['kd_transaksi'],
                'berat'=>$value['berat'],
                'biayaambil'=>$value['biayaambil'],
                'biayaantar'=>$value['biayaantar'],
                'jumlah'=>$value['jumlah'],
                'bayar'=>$value['bayar']
            ];
            $this->db->where('iddetail', $value['iddetail']);
            $this->db->update('detail', $itemdetail);
        }
        return $result;    
    }
    public function delete($kd_transaksi)
    {
        $this->db->where('kd_transaksi', $kd_transaksi);
        $result = $this->db->delete('transaksi');
        return $result;
    }
}