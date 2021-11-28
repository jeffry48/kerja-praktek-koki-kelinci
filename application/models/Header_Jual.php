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

    public function getOneData($id)
    {
        $query=$this->db->query('select * from hjual where id_hjual="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }
    public function searchHead($idh,$idk,$tgls,$tgle,$tots,$tote,$stat)
    {
        if($idh==null){
            $idh="HBL";
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
        $query = "";

        $query=$this->db->query('select * from hjual 
                                where id_hjual like "%'.$idh.'%" and id_konsumen like "%'.$idk.'%" and 
                                tanggal_jual between "'.$tgls.'" and "'.$tgle.'" and 
                                total_jual between '.$tots.' and '.$tote.' and 
                                status_jual="'.$stat.'"');

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