<?php
class keUpdateProduk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('produk/updateproduk.php');
    }
}