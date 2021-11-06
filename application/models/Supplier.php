<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Model
{
    private $_table = "supplier";

    public $idKaryawan;
    public $namaKaryawan;
    public $alamatKaryawan;
    public $noTelpKaryawan;

    public function getAll()
    {
        $query=$this->db->query("select * from supplier");
        $result = $query->result_array();
        return $result;
    }

    public function getOneData($id)
    {
        $query=$this->db->query('select * from supplier where id_supplier="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getFromSearch($nama,$alamat,$nohp)
    {
        $query=$this->db->query('select * from supplier where nama_supplier="'.$nama.'" and alamat_supplier="'.$alamat.'" and no_telp_supplier="'.$nohp.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getCount()
    {
        $query=$this->db->query("select count(*) from supplier");
        $result = $query->num_rows();
        return $result;
    }

    public function save($id,$nama,$alamat,$nohp)
    {
        $data = array(
            'id_supplier'=>$id,
            'nama_supplier'=>$nama,
            'alamat_supplier'=>$alamat,
            'no_telp_supplier'=>$nohp
        );
        $this->db->insert('supplier',$data);
    }

    public function update($id,$nama,$alamat,$nohp)
    {
        return $this->db->query("update supplier set nama_supplier='".$nama."'
        ,alamat_supplier='".$alamat."',no_telp_supplier
        ='".$nohp."' where id_supplier='".$id."'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_supplier" => $id));
    }
}