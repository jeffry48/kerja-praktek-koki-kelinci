<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Header_Beli extends CI_Model
{
    private $_table = "hbeli";

    public $idKonsumen;
    public $idKaryawan;
    public $namaKaryawan;
    public $alamatKaryawan;
    public $noTelpKaryawan;

    public function getAll()
    {
        $query=$this->db->query("select * from hbeli");
        $result = $query->result_array();
        return $result;
    }

    public function getOneData($id)
    {
        $query=$this->db->query('select * from hbeli where id_hbeli="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }
    public function searchHead($id,$ids,$tanggals,$tanggale,$totals,$totale,$status)
    {
        if($id==null){
            $id="HBL";
        }
        if($ids==null){
            $ids="SU";
        }
        if($tanggals==null){
            $tanggals='2000-1-1';
        }
        if($tanggale==null){
            $tanggale='2030-12-31';
        }
        if($totals==null){
            $totals="0";
        }
        if($totale==null){
            $totale="999999999999999999";
        }
        $query = "";

        $query=$this->db->query('select * from hbeli 
                                where id_hbeli like "%'.$id.'%" and id_supplier like "%'.$ids.'%" and 
                                tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and 
                                total_beli between '.$totals.' and '.$totale.' and 
                                status_beli="'.$status.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getCount()
    {
        $query=$this->db->query("select count(*) from hbeli");
        $result = $query->num_rows();
        return $result;
    }

    public function save($idhb,$tglbeli,$totalb,$ids,$status)
    {
        $data = array(
            'id_hbeli'=>$idhb,
            'tanggal_beli'=>$tglbeli,
            'total_beli'=>$totalb,
            'id_supplier'=>$ids,
            'status_beli'=>$status
        );
        $this->db->insert('hbeli',$data);
    }

    public function update($idhb,$tglbeli,$totalb,$ids,$status)
    {
        return $this->db->query("update hbeli set tanggal_beli='".$tglbeli."'
        ,total_beli='".$totalb."',id_supplier
        ='".$ids."',status_beli='".$status."' where id_hbeli='".$idhb."'");
    }

    public function updatesuppliertglp($idhb,$ids,$tglbeli)
    {
        return $this->db->query("update hbeli set tanggal_beli='".$tglbeli."'
        ,id_supplier
        ='".$ids."' where id_hbeli='".$idhb."'");
    }

    public function updatestatus($idhb,$status)
    {
        return $this->db->query("update hbeli set status_beli='".$status."'
        where id_hbeli='".$idhb."'");
    }
    public function updateTotal($idh,$total)
    {
        return $this->db->query("update hbeli set total_beli=".$total."
        where id_hbeli='".$idh."'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_hbeli" => $id));
    }
}