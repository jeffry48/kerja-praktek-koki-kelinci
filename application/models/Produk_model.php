<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model
{

    public $idProduk;
    public $namaProduk;
    public $hargaProduk;

    public $idKategori;

    public function getAllProduk()
    {
        $query=$this->db->query("select * from produk");
        $result = $query->result_array();
        return $result;
    }

    public function insertNewPro($namaPro, $hargaPro, $katPro)
    {
        $query=$this->db->query("select * from produk");
        $result = $query->result_array();
        $count=count($result);
        $newId="PR";
        if($count<10){
            $newId.="000";
        }
        else if($count>=10&&$count<100){
            $newId.="00";
        }
        else if($count>=100&&$count<1000){
            $newId.="0";
        }

        $query2=$this->db->query("select max(substring(id_produk, 3)) from produk");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_produk, 3))"];
        $newId.=$lastId+1;
        // var_dump($newId);
        
        return $this->db->query("insert into produk values('".$newId."', '".$katPro."', '".$namaPro."', ".$hargaPro.")");
    }

    public function getByIdPro($idPro)
    {
        $query=$this->db->query("select * from produk where id_produk='".$idPro."'");
        return $query->row_array();
    }

    public function searchPro($keyword, $hargaStart, $hargaEnd, $kategoriPro)
    {
        $query=null;
        if($hargaEnd==null){
            $hargaEnd=999999999999999;
        }
        if($hargaStart==null){
            $hargaStart=0;
        }
        
        if($kategoriPro!="all"){
            $query=$this->db->query("select * from produk where nama_produk like '%".$keyword."%' and harga_produk>=".$hargaStart." and harga_produk<=".$hargaEnd." and id_kategori='".$kategoriPro."'");
        }
        else{
            $query=$this->db->query("select * from produk where nama_produk like '%".$keyword."%' and harga_produk>=".$hargaStart." and harga_produk<=".$hargaEnd."");
        }
        $result=$query->result_array();
        return $result;
    }

    public function updatePro($idPro, $namaPro, $hargaPro, $katPro)
    {
        return $this->db->query("update produk set nama_produk='".$namaPro."', harga_produk=".$hargaPro.", id_kategori='".$katPro."' where id_produk='".$idPro."'");
    }

    public function deletePro($idPro)
    {
        var_dump($idPro);
        $deleteData=$this->db->query("delete from produk where id_produk='".$idPro."'");
    }
}