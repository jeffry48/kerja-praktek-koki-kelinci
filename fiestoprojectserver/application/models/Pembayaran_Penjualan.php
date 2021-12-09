<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_Penjualan extends CI_Model
{
    private $_table = "pjual";

    public $idKonsumen;
    public $idKaryawan;
    public $namaKaryawan;
    public $alamatKaryawan;
    public $noTelpKaryawan;

    public function getAll()
    {
        $query=$this->db->query("select * from pjual");
        $result = $query->result_array();
        return $result;
    }

    public function getByHeader($id)
    {
        $query=$this->db->query('select * from pjual where id_hjual="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getOneData($id)
    {
        $query=$this->db->query('select * from pjual where id_jual="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getCount()
    {
        $query=$this->db->query("select count(*) from pjual");
        $result = $query->num_rows();
        return $result;
    }

    public function save($idb,$idhb,$tglbeli,$note,$metode,$nom)
    {
        $data = array(
            'id_jual'=>$idb,
            'id_hjual'=>$idhb,
            'tgl_jual'=>$tglbeli,
            'note_jual'=>$note,
            'metode_jual'=>$metode,
            'nominal_bayar'=>$nom
        );
        $this->db->insert('pjual',$data);
    }
    public function deleteByHeader($idh)
    {
        $query=$this->db->query("delete from pjual where id_hjual='".$idh."'");
        return $query;
    }
}