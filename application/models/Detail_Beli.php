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
    public function getAllDateDesc()
    {
        $query=$this->db->query("select * from dbeli d
                                join hbeli h on h.id_hbeli=d.id_hbeli
                                order by h.tanggal_beli desc");
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
    public function searchDet($idd, $idh, $nama, $hst, $hse, $jst, $jse, $sst, $sse)
    {
        if($idd==null){
            $idd="DBL";
        }
        if($idh==null){
            $idh="HBL";
        }
        if($nama==null){
            $nama="";
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

        $query=$this->db->query('select * from dbeli 
                where id_dbeli like "%'.$idd.'%" and id_hbeli like "%'.$idh.'%" and 
                nama_pembelian like "%'.$nama.'%" and subtotal/jumlah_beli between '.$jst.' and '.$jse.' and 
                subtotal between '.$sst.' and '.$sse.'');
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