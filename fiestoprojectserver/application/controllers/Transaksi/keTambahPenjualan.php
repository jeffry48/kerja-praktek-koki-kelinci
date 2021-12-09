<?php
class keTambahPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
        $this->load->model("Customer");
        $this->load->model("Produk_model");
    }

    public function index()
    {
        $this->load->helper('url');
        $query3=$this->db->query("select max(substring(id_hjual, 6)) from hjual");
        $result1 = $query3->result_array();
        $lastId1=(int)$result1[0]["max(substring(id_hjual, 6))"];
        $lastId1+=1;
        $id1 = "";
        if($lastId1 < 10)
            $id1 .= "HJL00000";
        else if ($lastId1 >= 10 && $lastId1 < 100)
            $id1 .= "HJL0000";
        else if ($lastId1 >= 100 && $lastId1 < 1000)
            $id1 .= "HJL000";
        else if ($lastId1 >= 1000 && $lastId1 < 10000)
            $id1 .= "HJL00";
        else if ($lastId1 >= 10000 && $lastId1 < 100000)
            $id1 .= "HJL0";
        else
            $id1 .= "HJL";
        $id1.=($lastId1);
        $data['karyawan'] = $this->Detail_Jual->getByHeader($id1);
        $data['karyawan1'] = $this->Customer->getAll();
        $data['karyawan2'] = $this->Produk_model->getAllProduk();
        $this->load->view('penjualan/tambah_penjualan.php',$data);
        
    }
}