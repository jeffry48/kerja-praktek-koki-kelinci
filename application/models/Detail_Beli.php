<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_Beli extends CI_Model
{
    private $_table = "dbeli";

    public $idKonsumen;
    public $idKaryawan;
    public $namaKaryawan;
    public $alamatKaryawan;
    public $noTelpKaryawan;

    public function getAll()
    {
        $query=$this->db->query("select * from dbeli");
        $result = $query->result_array();
        return $result;
    }

    public function getOneData($id)
    {
        $query=$this->db->query('select * from dbeli where id_dbeli="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getByHeader($id)
    {
        $query=$this->db->query('select * from dbeli where id_hbeli="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getFromSearch($id,$ids,$tanggals,$tanggale,$totals,$totale,$status)
    {
        $query = "";
        if($id != null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where id_dbeli="'.$id.'"');
        }
        else if($id == null && $ids != null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where id_hbeli="'.$ids.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where jumlah_beli="'.$tanggals.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale != null && $totals == null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where jumlah_beli="'.$tanggale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where subtotal="'.$totals.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where subtotal="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status != null)
        {
            $query=$this->db->query('select * from dbeli where status_beli="'.$status.'"');
        }
        else if($id != null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where id_dbeli="'.$id.'" and subtotal >="'.$totals.'" and subtotal<="'.$totale.'"');
        }
        else if($id == null && $ids != null &&  $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where id_hbeli="'.$ids.'" and subtotal >="'.$totals.'" and subtotal<="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from dbeli where status_beli="'.$status.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'"');
        }
        else if($id != null && $ids != null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from dbeli where id_dbeli="'.$id.'" and id_supplier="'.$ids.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'" and status_beli="'.$status.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli="'.$totals.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals == null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli ="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals == null && $totale == null && $status != null)
        {
            $query=$this->db->query('select * from dbeli where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and status_beli ="'.$status.'"');
        }
        else if($id != null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where id_dbeli="'.$id.'" and tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'"');
        }
        else if($id == null && $ids != null &&  $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from dbeli where id_supplier="'.$ids.'" and tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from dbeli where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'" and status_beli="'.$status.'"');
        }
        else if($id != null && $ids != null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from dbeli where id_dbeli="'.$id.'" and id_supplier="'.$ids.'" and tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_beli >="'.$totals.'" and total_beli<="'.$totale.'" and status_beli ="'.$status.'"');
        }
        $result = $query->result_array();
        return $result;
    }

    public function getCount()
    {
        $query=$this->db->query("select count(*) from dbeli");
        $result = $query->num_rows();
        return $result;
    }

    public function save($idd,$idh,$jumlah,$subtotal,$nama)
    {
        $data = array(
            'id_dbeli'=>$idd,
            'id_hbeli'=>$idh,
            'nama_pembelian'=>$nama,
            'jumlah_beli'=>$jumlah,
            'subtotal'=>$subtotal
        );
        $this->db->insert('dbeli',$data);
    }

    public function update($nama, $jumlah, $subtotal, $idd)
    {
        return $this->db->query("update dbeli set nama_pembelian='".$nama."',jumlah_beli=".$jumlah."
        ,subtotal=".$subtotal." where id_dbeli='".$idd."'");
    }

    public function updateheader($idd,$idh)
    {
        return $this->db->query("update dbeli set id_hbeli = '".$idh."' where id_dbeli='".$idd."'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_dbeli" => $id));
    }
    public function deletebyheader($id)
    {
        return $this->db->delete($this->_table, array("id_hbeli" => $id));
    }
}