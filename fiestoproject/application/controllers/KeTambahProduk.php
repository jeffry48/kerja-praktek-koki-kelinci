<?php
class keTambahProduk extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("produk_model");
        $this->load->model("kategori_model");
        $this->load->library('session');
    }

    public function index()
    {
        $allKat=$this->kategori_model->getAllkategori();
        
        $_SESSION['dataKategori'] = $allKat;
        $this->load->helper('url');
        $this->load->view('produk/tambahproduk.php');
        
    }
}