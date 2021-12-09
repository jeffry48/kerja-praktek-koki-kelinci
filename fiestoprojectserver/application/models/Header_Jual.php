<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Header_Jual extends CI_Model
{
    private $_table = "hjual";

    public $idKonsumen;
    public $idKaryawan;
    public $namaKaryawan;
    public $alamatKaryawan;
    public $noTelpKaryawan;

    public function getAll()
    {
        $query=$this->db->query("select * from hjual");
        $result = $query->result_array();
        return $result;
    }
    public function getAllDateDesc()
    {
        $query=$this->db->query("select * from hjual order by tanggal_jual desc");
        $result = $query->result_array();
        return $result;
    }

    public function getOneData($id)
    {
        $query=$this->db->query('select * from hjual where id_hjual="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }
    public function searchHead($idh,$idk,$tgls,$tgle,$tots,$tote,$stat, 
                    $idd, $idp, $kat, $hst, $hse, $jst, $jse, $sst, $sse)
    {
        if($idh==null){
            $idh="HJL";
        }
        if($idk==null){
            $idk="CU";
        }
        if($tgls==null){
            $tgls='2000-1-1';
        }
        if($tgle==null){
            $tgle='2030-12-31';
        }
        if($tots==null){
            $tots="0";
        }
        if($tote==null){
            $tote="999999999999999999";
        }
        if($idd==null){
            $idd="DJL";
        }
        if($idp==null){
            $idp="PR";
        }
        if($kat==null){
            $kat="KT";
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
        $query = "";
        // var_dump($resultKat[1]);

        
        $query=$this->db->query('select * from djual d 
                                join hjual h on d.id_hjual=h.id_hjual
                                join produk p on p.id_produk=d.id_produk
                                where h.id_hjual like "%'.$idh.'%" and 
                                h.id_konsumen like "%'.$idk.'%" and 
                                h.tanggal_jual between "'.$tgls.'" and "'.$tgle.'" and 
                                h.total_jual between '.$tots.' and '.$tote.' and 
                                h.status_jual like "'.$stat.'" and 
                                d.id_djual like "%'.$idd.'%" and 
                                d.id_produk like "%'.$idp.'%" and 
                                d.subtotal/d.jumlah_jual between '.$hst.' and '.$hse.' and 
                                d.jumlah_jual between '.$jst.' and '.$jse.' and
                                d.subtotal between '.$sst.' and '.$sse.' and 
                                (p.id_kategori like "%'.$kat.'%" and p.id_produk like "%'.$idp.'%")
                                order by h.tanggal_jual desc');
        $result = $query->result_array();
        return $result;
    }

    public function getCount()
    {
        $query=$this->db->query("select count(*) from hjual");
        $result = $query->num_rows();
        return $result;
    }

    public function save($idhb,$tglbeli,$totalb,$ids,$status)
    {
        $data = array(
            'id_hjual'=>$idhb,
            'tanggal_jual'=>$tglbeli,
            'total_jual'=>$totalb,
            'id_konsumen'=>$ids,
            'status_jual'=>$status
        );
        $this->db->insert('hjual',$data);
    }

    public function update($idhb,$tglbeli,$totalb,$ids,$status)
    {
        return $this->db->query("update hjual set tanggal_jual='".$tglbeli."'
        ,total_jual='".$totalb."',id_konsumen
        ='".$ids."',status_jual='".$status."' where id_hjual='".$idhb."'");
    }

    public function updatesuppliertglp($idhb,$ids,$tglbeli)
    {
        return $this->db->query("update hjual set tanggal_jual='".$tglbeli."'
        ,id_konsumen
        ='".$ids."' where id_hjual='".$idhb."'");
    }

    public function updatestatus($idhb,$status)
    {
        return $this->db->query("update hjual set status_jual='".$status."'
        where id_hjual='".$idhb."'");
    }
    public function updateTotal($idhb,$total)
    {
        return $this->db->query("update hjual set total_jual='".$total."'
        where id_hjual='".$idhb."'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_hjual" => $id));
    }
}