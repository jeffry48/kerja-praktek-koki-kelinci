<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Model
{
    private $_table = "konsumen";

    public $idKonsumen;
    public $idKaryawan;
    public $namaKaryawan;
    public $alamatKaryawan;
    public $noTelpKaryawan;

    public function getAll()
    {
        $query=$this->db->query("select * from konsumen");
        $result = $query->result_array();
        return $result;
    }

    public function getOneData($id)
    {
        $query=$this->db->query('select * from konsumen where id_konsumen="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getFromSearch($nama,$alamat,$nohp)
    {
        $query=$this->db->query('select * from konsumen where nama_konsumen="'.$nama.'" and alamat_konsumen="'.$alamat.'" and no_telp_konsumen="'.$nohp.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getCount()
    {
        $query=$this->db->query("select count(*) from konsumen");
        $result = $query->num_rows();
        return $result;
    }

    public function save($id,$idk,$nama,$alamat,$nohp)
    {
        $data = array(
            'id_konsumen'=>$id,
            'id_karyawan'=>$idk,
            'nama_konsumen'=>$nama,
            'alamat_konsumen'=>$alamat,
            'no_telp_konsumen'=>$nohp
        );
        $this->db->insert('konsumen',$data);
    }

    public function update($id,$nama,$alamat,$nohp)
    {
        return $this->db->query("update konsumen set nama_konsumen='".$nama."'
        ,alamat_konsumen='".$alamat."',no_telp_konsumen
        ='".$nohp."' where id_konsumen='".$id."'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_konsumen" => $id));
    }
}