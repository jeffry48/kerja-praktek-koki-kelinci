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

    public function getFromSearch($id,$ids,$tanggals,$tanggale,$totals,$totale,$status)
    {
        $query = "";
        if($id != null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from djual where id_djual="'.$id.'"');
        }
        else if($id == null && $ids != null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from djual where id_hjual="'.$ids.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale == null && $totals == null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from djual where jumlah_jual="'.$tanggals.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale != null && $totals == null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from djual where jumlah_jual="'.$tanggale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from djual where subtotal="'.$totals.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from djual where subtotal="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals == null && $totale == null && $status != null)
        {
            $query=$this->db->query('select * from djual where status_jual="'.$status.'"');
        }
        else if($id != null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from djual where id_djual="'.$id.'" and subtotal >="'.$totals.'" and subtotal<="'.$totale.'"');
        }
        else if($id == null && $ids != null &&  $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from djual where id_hjual="'.$ids.'" and subtotal >="'.$totals.'" and subtotal<="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from djual where status_jual="'.$status.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'"');
        }
        else if($id != null && $ids != null && $tanggals == null && $tanggale == null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from djual where id_djual="'.$id.'" and id_hjual="'.$ids.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale == null && $status == null)
        {
            $query=$this->db->query('select * from djual where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_jual="'.$totals.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals == null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from djual where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_jual ="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals == null && $totale == null && $status != null)
        {
            $query=$this->db->query('select * from djual where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and status_jual ="'.$status.'"');
        }
        else if($id != null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from djual where id_djual="'.$id.'" and tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'"');
        }
        else if($id == null && $ids != null &&  $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status == null)
        {
            $query=$this->db->query('select * from djual where id_supplier="'.$ids.'" and tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'"');
        }
        else if($id == null && $ids == null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from djual where tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'" and status_jual="'.$status.'"');
        }
        else if($id != null && $ids != null && $tanggals != null && $tanggale != null && $totals != null && $totale != null && $status != null)
        {
            $query=$this->db->query('select * from djual where id_djual="'.$id.'" and id_supplier="'.$ids.'" and tanggal_beli between "'.$tanggals.'" and "'.$tanggale.'" and total_jual >="'.$totals.'" and total_jual<="'.$totale.'" and status_jual ="'.$status.'"');
        }
        $result = $query->result_array();
        return $result;
    }

    public function getCount()
    {
        $query=$this->db->query("select count(*) from djual");
        $result = $query->num_rows();
        return $result;
    }

    public function save($idd,$jumlah,$subtotal,$idp,$idh,$ktr)
    {
        $data = array(
            'id_djual'=>$idd,
            'jumlah_jual'=>$jumlah,
            'subtotal'=>$subtotal,
            'id_produk'=>$idp,
            'id_hjual'=>$idh,
            'nama_penjualan'=>$ktr
        );
        $this->db->insert('djual',$data);
    }

    public function update($idd,$idh,$jumlah,$subtotal,$idp)
    {
        return $this->db->query("update djual set id_hjual = '".$idh."' ,jumlah_jual='".$jumlah."'
        ,subtotal='".$subtotal."',id_produk
        ='".$idp."' where id_djual='".$idd."'");
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