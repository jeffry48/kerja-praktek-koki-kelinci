<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Model
{
    private $_table = "karyawan";

    public $idKaryawan;
    public $namaKaryawan;
    public $jabatanKaryawan;
    public $alamatKaryawan;
    public $noTelpKaryawan;
    public $jenisKelKaryawan;

    // public function rules()
    // {
    //     return [
    //         ['field' => 'name',
    //         'label' => 'Name',
    //         'rules' => 'required'],

    //         ['field' => 'price',
    //         'label' => 'Price',
    //         'rules' => 'numeric'],
            
    //         ['field' => 'description',
    //         'label' => 'Description',
    //         'rules' => 'required']
    //     ];
    // }

    public function getAll()
    {
        // return $this->db->get($this->_table)->result();
        $query=$this->db->query("select * from karyawan");
        $result = $query->result_array();
        return $result;
    }

    public function cekDataLogin($nama, $pass)
    {
        // return $this->db->get_where($this->_table, ["id_karyawan" => $id])->row();
        $query=$this->db->query("select * from karyawan where nama_karyawan='".$nama."' and password_karyawan='".$pass."'");
        $result = $query->result_array();
        return $result;
    }

    public function cekPassLama($id, $passlama)
    {
        // return $this->db->get_where($this->_table, ["id_karyawan" => $id])->row();
        $query=$this->db->query("select * from karyawan where id_karyawan='".$id."' and password_karyawan='".$passlama."'");
        $result = $query->num_rows();
        return $result;
    }

    public function updatepassbaru($id,$passbaru)
    {
        return $this->db->query("update karyawan set password_karyawan='".$passbaru."' where id_karyawan='".$id."'");
    }

    public function getOneData($id)
    {
        // return $this->db->get($this->_table)->result();
        
        $query=$this->db->query('select * from karyawan where id_karyawan="'.$id.'"');
        $result = $query->result_array();
        return $result;
    }

    public function getFromSearch($nama,$posisi,$alamat,$nohp,$jk)
    {
        // return $this->db->get($this->_table)->result();

        if($nama != null && $posisi != null && $alamat != null && $nohp != null && $jk != null)
            $query=$this->db->query('select * from karyawan where nama_karyawan like "%'.$nama.'%" and 
            jabatan_karyawan like "%'.$posisi.'%" and alamat_karyawan like "%'.$alamat.'%" and no_telp_karyawan like "%'.$nohp.'%" and
            jk_karyawan like "%'.$jk.'%"');
        else if($nama != null && $posisi == null && $alamat == null && $nohp == null && $jk == null)
            $query=$this->db->query('select * from karyawan where nama_karyawan like "%'.$nama.'%"');
        else if($nama == null && $posisi != null && $alamat == null && $nohp == null && $jk == null)
            $query=$this->db->query('select * from karyawan where jabatan_karyawan like "%'.$posisi.'%"');
        else if($nama == null && $posisi == null && $alamat != null && $nohp == null && $jk == null)
            $query=$this->db->query('select * from karyawan where alamat_karyawan like "%'.$alamat.'%"');
        else if($nama == null && $posisi == null && $alamat == null && $nohp != null && $jk == null)
            $query=$this->db->query('select * from karyawan where no_telp_karyawan like "%'.$nohp.'%"');
        else if($nama == null && $posisi == null && $alamat == null && $nohp == null && $jk != null)
            $query=$this->db->query('select * from karyawan where jk_karyawan like "%'.$jk.'%"');
        else if($nama != null && $posisi != null && $alamat == null && $nohp == null && $jk == null)
            $query=$this->db->query('select * from karyawan where nama_karyawan like "%'.$nama.'%" and jabatan_karyawan like "%'.$posisi.'%"');
        else if($nama != null && $posisi == null && $alamat != null && $nohp == null && $jk == null)
            $query=$this->db->query('select * from karyawan where nama_karyawan like "%'.$nama.'%" and alamat_karyawan like "%'.$alamat.'%"');
        else if($nama != null && $posisi == null && $alamat == null && $nohp != null && $jk == null)
            $query=$this->db->query('select * from karyawan where nama_karyawan like "%'.$nama.'%" and no_telp_karyawan like "%'.$nohp.'%"');
        else if($nama != null && $posisi == null && $alamat == null && $nohp == null && $jk != null)
            $query=$this->db->query('select * from karyawan where nama_karyawan like "%'.$nama.'%" and jk_karyawan like "%'.$jk.'%"');
        else if($nama == null && $posisi != null && $alamat != null && $nohp == null && $jk == null)
            $query=$this->db->query('select * from karyawan where jabatan_karyawan like "%'.$posisi.'%" and alamat_karyawan like "%'.$alamat.'%"');
        else if($nama == null && $posisi != null && $alamat == null && $nohp != null && $jk == null)
            $query=$this->db->query('select * from karyawan where jabatan_karyawan like "%'.$posisi.'%" and no_telp_karyawan like "%'.$nohp.'%"');
        else if($nama == null && $posisi != null && $alamat == null && $nohp == null && $jk != null)
            $query=$this->db->query('select * from karyawan where jabatan_karyawan like "%'.$posisi.'%" and jk_karyawan like "%'.$jk.'%"');
        else if($nama == null && $posisi == null && $alamat != null && $nohp != null && $jk == null)
            $query=$this->db->query('select * from karyawan where alamat_karyawan like "%'.$alamat.'%" and no_telp_karyawan like "%'.$nohp.'%"');
        else if($nama == null && $posisi == null && $alamat != null && $nohp == null && $jk != null)
            $query=$this->db->query('select * from karyawan where alamat_karyawan like "%'.$alamat.'%" and jk_karyawan like "%'.$jk.'%"');
        else if($nama == null && $posisi == null && $alamat == null && $nohp != null && $jk != null)
            $query=$this->db->query('select * from karyawan where no_telp_karyawan like "%'.$nohp.'%" and jk_karyawan like "%'.$jk.'%"');

        $result = $query->result_array();
        return $result;
    }

    public function getCount()
    {
        
        $query=$this->db->query("select count(*) from karyawan");
        $result = $query->num_rows();
        return $result;
    }
    
    // public function cekLogin($nama, $pass)
    // {
    //     // return $this->db->get_where($this->_table, ["id_karyawan" => $id])->row();
    //     $query=$this->db->query("select * from karyawan where nama_karyawan='".$nama."' and password_karyawan='".$pass."'");
    //     $result = $query->row_array();
    //     if (is_array($result) && count($result) > 0) {
    //         return true;
    //     }
    //     return false;
    // }

    public function save($id,$nama,$password,$posisi,$alamat,$nohp,$jk)
    {
        $data = array(
            'id_karyawan'=>$id,
            'nama_karyawan'=>$nama,
            'password_karyawan'=>$password,
            'jabatan_karyawan'=>$posisi,
            'alamat_karyawan'=>$alamat,
            'no_telp_karyawan'=>$nohp,
            'jk_karyawan'=>$jk
        );
        // $this->db->insert('karyawan',$data);
        return $this->db->query("insert into karyawan (id_karyawan,nama_karyawan,password_karyawan,
        jabatan_karyawan,alamat_karyawan,no_telp_karyawan,jk_karyawan) values ('".$id."','".$nama."',
        '".$password."','".$posisi."','".$alamat."','".$nohp."','".$jk."')");
    }

    public function update($id,$nama,$posisi,$alamat,$nohp,$jk)
    {
        $data = array(
            'id_karyawan'=>$id,
            'nama_karyawan'=>$nama,
            'jabatan_karyawan'=>$posisi,
            'alamat_karyawan'=>$alamat,
            'no_telp_karyawan'=>$nohp,
            'jk_karyawan'=>$jk
        );
        // $post = $this->input->post();
        // $this->product_id = $post["id"];
        // $this->name = $post["name"];
        // $this->price = $post["price"];
        // $this->description = $post["description"];
        return $this->db->query("update karyawan set nama_karyawan='".$nama."',jabatan_karyawan
        ='".$posisi."',alamat_karyawan
        ='".$alamat."',no_telp_karyawan
        ='".$nohp."',jk_karyawan
        ='".$jk."' where id_karyawan='".$id."'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_karyawan" => $id));
    }
}