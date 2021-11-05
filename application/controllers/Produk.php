<?php
class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("produk_model");
        $this->load->model("kategori_model");
        $this->load->library('session');
    }

    public function index()
    {
        $allPro = $this->produk_model->getAllProduk();
        $_SESSION['dataProduk'] = $allPro;

        $allKat = $this->kategori_model->getAllKategori();
        $_SESSION['dataKategori'] = $allKat;

        $this->load->helper('url');
        $this->load->view('produk/produk.php');
        
    }
}