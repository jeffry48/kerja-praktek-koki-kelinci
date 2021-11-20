<?php
class penjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
        $this->load->model("Kategori_model");
    }

    public function index()
    {
        
        $this->load->helper('url');
        $data['karyawan'] = $this->Header_Jual->getAll();
        $data['karyawan1'] = $this->Detail_Jual->getAll();
        $data['karyawan2'] = $this->Kategori_model->getAllKategori();
        $this->load->view('penjualan/cari_penjualan.php',$data);
        
    }
}