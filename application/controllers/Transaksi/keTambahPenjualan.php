<?php
class keTambahPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
    }

    public function index()
    {
        
        $this->load->helper('url');
        $data['karyawan'] = $this->Produk_model->getAllProduk();
        $this->load->view('penjualan/tambah_penjualan.php',$data);
        
    }
}