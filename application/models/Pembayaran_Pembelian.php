<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_Pembelian extends CI_Model
{
    private $_table = "pbeli";

    public $idKonsumen;
    public $idKaryawan;
    public $namaKaryawan;
    public $alamatKaryawan;
    public $noTelpKaryawan;

    public function getAll()
    {
        $query=$this->db->query("select * from pbeli");
        $result = $query->result_array();
        return $result;
    }

    public function getOneData($id)
    {
        $query=$this->db->query('select * from pbeli where id_beli="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getCount()
    {
        $query=$this->db->query("select count(*) from pbeli");
        $result = $query->num_rows();
        return $result;
    }

    public function save($idb,$idhb,$tglbeli,$note,$metode,$nom)
    {
        $data = array(
            'id_beli'=>$idb,
            'id_hbeli'=>$idhb,
            'tgl_beli'=>$tglbeli,
            'note_beli'=>$note,
            'metode_bayar'=>$metode,
            'nominal_bayar'=>$nom
        );
        $this->db->insert('pbeli',$data);
    }
}