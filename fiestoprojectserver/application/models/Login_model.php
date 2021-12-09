<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
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
        $result = $query->row_array();
        return $result;
    }
    
    public function cekLogin($nama, $pass)
    {
        // return $this->db->get_where($this->_table, ["id_karyawan" => $id])->row();
        $query=$this->db->query("select * from karyawan where nama_karyawan='".$nama."' and password_karyawan='".$pass."'");
        $result = $query->row_array();
        if (is_array($result) && count($result) > 0) {
            return true;
        }
        return false;
    }

    public function save()
    {
        // $post = $this->input->post();
        // $this->product_id = uniqid();
        // $this->name = $post["name"];
        // $this->price = $post["price"];
        // $this->description = $post["description"];
        // return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        // $post = $this->input->post();
        // $this->product_id = $post["id"];
        // $this->name = $post["name"];
        // $this->price = $post["price"];
        // $this->description = $post["description"];
        // return $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }

    public function delete($id)
    {
        // return $this->db->delete($this->_table, array("product_id" => $id));
    }
}