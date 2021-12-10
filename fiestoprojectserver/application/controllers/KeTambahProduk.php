<?php
class keTambahProduk extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("kategori_model");

    }

    public function index()
    {
        $allKat=$this->kategori_model->getAllkategori();
        
        $_SESSION['dataKategori'] = $allKat;
        $this->load->helper('url');
        // $this->load->view('produk/tambahproduk.php');
        redirect(base_url()."keTambahProduk");
        
    }
}