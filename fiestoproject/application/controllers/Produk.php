<?php
class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $data=$_SESSION['dataKategori'];
        $data=$_SESSION['dataProduk'];
        $this->load->view('produk/produk.php',$data);
        
    }
}