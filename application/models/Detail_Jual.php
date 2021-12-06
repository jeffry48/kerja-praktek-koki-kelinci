<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_Jual extends CI_Model
{
    private $_table = "djual";

    public $idKonsumen;
    public $idKaryawan;
    public $namaKaryawan;
    public $alamatKaryawan;
    public $noTelpKaryawan;

    public function getAll()
    {
        $query=$this->db->query("select * from djual");
        $result = $query->result_array();
        return $result;
    }
    public function getAllDateDesc()
    {
        $query=$this->db->query("select * from djual d
                                join hjual h on h.id_hjual=d.id_hjual
                                order by h.tanggal_jual desc");
        $result = $query->result_array();
        return $result;
    }

    public function getOneData($id)
    {
        $query=$this->db->query('select * from djual where id_djual="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getByHeader($id)
    {
        $query=$this->db->query('select * from djual where id_hjual="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }

    public function searchDet($idd, $idp, $kat, $hst, $hse, $jst, $jse, $sst, $sse)
    {
        if($idd==null){
            $idd="DJL";
        }
        if($idp==null){
            $idp="PR";
        }
        if($kat==null){
            $kat="KAT";
        }
        if($hst==null){
            $hst="0";
        }
        if($hse==null){
            $hse="9999999999999999";
        }
        if($jst==null){
            $jst="0";
        }
        if($jse==null){
            $jse="999999999999999";
        }
        if($sst==null){
            $sst="0";
        }
        if($sse==null){
            $sse="9999999999999";
        }
        $resultKat=$this->db->query('select * from produk where id_kategori="'.$kat.'" and 
                                    id_produk like "%'.$idp.'%"')->result_array();
        // var_dump($resultKat[1]);
        $query=$this->db->query('select j.id_produk from djual j, produk p
                where p.id_kategori="'.$kat.'" and p.id_produk like "%'.$idp.'%"
                and j.id_produk=p.id_produk
                group by id_produk');
        $query=$this->db->query('select j.* from djual j, produk p
                where j.id_djual like "%'.$idd.'%" and j.id_produk like "%'.$idp.'%" and 
                j.subtotal/j.jumlah_jual between '.$hst.' and '.$hse.' and 
                j.jumlah_jual between '.$jst.' and '.$jse.' and
                j.subtotal between '.$sst.' and '.$sse.' and 
                (p.id_kategori="'.$kat.'" and p.id_produk like "%'.$idp.'%") and 
                j.id_produk=p.id_produk
                group by p.id_produk');
        $result = $query->result_array();
        return $result;
    }

    public function getCount()
    {
        $query=$this->db->query("select count(*) from djual");
        $result = $query->num_rows();
        return $result;
    }

    public function save($idd,$jumlah,$subtotal,$idp,$idh)
    {
        $data = array(
            'id_djual'=>$idd,
            'jumlah_jual'=>$jumlah,
            'subtotal'=>$subtotal,
            'id_produk'=>$idp,
            'id_hjual'=>$idh,
        );
        $this->db->insert('djual',$data);
    }

    public function update($jumlah,$subtotal,$idp, $idd)
    {
        return $this->db->query("update djual set jumlah_jual='".$jumlah."',
        subtotal='".$subtotal."',id_produk='".$idp."' where id_djual='".$idd."'");
    }

    public function updateheader($idd,$idh)
    {
        return $this->db->query("update djual set id_hjual = '".$idh."' where id_djual='".$idd."'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_djual" => $id));
    }
    public function deletebyheader($id)
    {
        return $this->db->delete($this->_table, array("id_hjual" => $id));
    }
}