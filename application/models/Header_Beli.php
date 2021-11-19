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

    public function getFromSearch($id,$ids,$tanggals,$tanggale,$totals,$totale,$status)
    {
        $query = "";
        if($id != null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            return $query=$this->db->query('select * from hbeli where id_hbeli="'.$id.'"')->result_array();
        }
        else if($id == null && $ids != null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            return $query=$this->db->query('select * from hbeli where id_supplier="'.$ids.'"')->result_array();
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            return $query=$this->db->query('select * from hbeli where tanggal_beli="'.$tanggals.'"')->result_array();
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale != null && $totals == null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from hbeli where tanggal_beli="'.$tanggale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from hbeli where total_beli="'.$totals.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hbeli where total_beli="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status != null)
        {
            $query=$this->db->query('select * from hbeli where status_beli="'.$status.'"');
        }
        else if($id != null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hbeli where id_hbeli="'.$id.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'"');
        }
        else if($id == null && $ids != null &&  $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hbeli where id_supplier="'.$ids.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from hbeli where status_beli="'.$status.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'"');
        }
        else if($id != null && $ids != null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from hbeli where id_hbeli="'.$id.'" and id_supplier="'.$ids.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'" and status_beli="'.$status.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from hbeli where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli="'.$totals.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals == null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hbeli where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli ="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals == null && $totale == null && $status != null)
        {
            $query=$this->db->query('select * from hbeli where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and status_beli ="'.$status.'"');
        }
        else if($id != null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hbeli where id_hbeli="'.$id.'" and tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'"');
        }
        else if($id == null && $ids != null &&  $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hbeli where id_supplier="'.$ids.'" and tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from hbeli where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'" and status_beli="'.$status.'"');
        }
        else if($id != null && $ids != null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from hbeli where id_hbeli="'.$id.'" and id_supplier="'.$ids.'" and tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'" and status_beli ="'.$status.'"');
        }
        // $result = $query->result_array();
        // $results = $query->result();
        // return $query;
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

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_hbeli" => $id));
    }
}