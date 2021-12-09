<?php
class penjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        $data=$_SESSION['data'];
        $this->load->view('penjualan/cari_penjualan.php',$data);
        
    }
}