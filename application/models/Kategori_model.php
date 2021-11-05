<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

    public $idKategori;
    public $namaKategori;

    public function getAllKategori()
    {
        $query=$this->db->query("select * from kategori");
        $result = $query->result_array();
        return $result;
    }

    public function insertNewKat($namaKat)
    {
        $query=$this->db->query("select * from kategori");
        $result = $query->result_array();
        $count=count($result);
        $newId="KT";
        if($count<10){
            $newId.="000";
        }
        else if($count>=10&&$count<100){
            $newId.="00";
        }
        else if($count>=100&&$count<1000){
            $newId.="0";
        }

        $query2=$this->db->query("select max(substring(id_kategori, 3)) from kategori");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_kategori, 3))"];
        $newId.=$lastId+1;
        // var_dump($newId);
        
        return $this->db->query("insert into kategori values('".$newId."', '".$namaKat."')");
    }

    public function getByIdkat($idKat)
    {
        $query=$this->db->query("select * from kategori where id_kategori='".$idKat."'");
        return $query->row_array();
    }

    public function searchKat($keyword)
    {
        // var_dump($keyword);
        $query=$this->db->query("select * from kategori where nama_kategori like '%".$keyword."%'");
        $result=$query->result_array();
        // var_dump($result);
        return $result;
    }

    public function updateKat($idKat, $namaKat)
    {
        // var_dump($idKat);
        return $this->db->query("update kategori set nama_kategori='".$namaKat."' where id_kategori='".$idKat."'");
        // $post = $this->input->post();
        // $this->product_id = $post["id"];
        // $this->name = $post["name"];
        // $this->price = $post["price"];
        // $this->description = $post["description"];
        // return $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }

    public function deleteKat($idKat)
    {
        var_dump($idKat);
        $deleteData=$this->db->query("delete from kategori where id_kategori='".$idKat."'");
    }
}