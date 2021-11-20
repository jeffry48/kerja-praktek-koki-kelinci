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

    public function getFromSearch($id,$ids,$tanggals,$tanggale,$totals,$totale,$status)
    {
        $query = "";
        if($id != null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            return $query=$this->db->query('select * from hjual where id_hjual="'.$id.'"')->result_array();
        }
        else if($id == null && $ids != null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            return $query=$this->db->query('select * from hjual where id_konsumen="'.$ids.'"')->result_array();
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            return $query=$this->db->query('select * from hjual where tanggal_jual="'.$tanggals.'"')->result_array();
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale != null && $totals == null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from hjual where tanggal_jual="'.$tanggale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from hjual where total_jual="'.$totals.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hjual where total_jual="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status != null)
        {
            $query=$this->db->query('select * from hjual where status_jual="'.$status.'"');
        }
        else if($id != null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hjual where id_hjual="'.$id.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'"');
        }
        else if($id == null && $ids != null &&  $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hjual where id_supplier="'.$ids.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from hjual where status_jual="'.$status.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'"');
        }
        else if($id != null && $ids != null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from hjual where id_hjual="'.$id.'" and id_supplier="'.$ids.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'" and status_jual="'.$status.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from hjual where tanggal_jual between "'.$tanggals.'" and "'.$tanggale.'" and total_jual="'.$totals.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals == null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hjual where tanggal_jual between "'.$tanggals.'" and "'.$tanggale.'" and total_jual ="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals == null && $totale == null && $status != null)
        {
            $query=$this->db->query('select * from hjual where tanggal_jual between "'.$tanggals.'" and "'.$tanggale.'" and status_jual ="'.$status.'"');
        }
        else if($id != null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hjual where id_hjual="'.$id.'" and tanggal_jual between "'.$tanggals.'" and "'.$tanggale.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'"');
        }
        else if($id == null && $ids != null &&  $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from hjual where id_supplier="'.$ids.'" and tanggal_jual between "'.$tanggals.'" and "'.$tanggale.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from hjual where tanggal_jual between "'.$tanggals.'" and "'.$tanggale.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'" and status_jual="'.$status.'"');
        }
        else if($id != null && $ids != null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from hjual where id_hjual="'.$id.'" and id_supplier="'.$ids.'" and tanggal_jual between "'.$tanggals.'" and "'.$tanggale.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'" and status_jual ="'.$status.'"');
        }
        // $result = $query->result_array();
        // $results = $query->result();
        // return $query;
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

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_hjual" => $id));
    }
}