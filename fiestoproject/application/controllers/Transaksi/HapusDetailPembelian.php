<?php
class hapusDetailPembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
    }

    public function index()
    {
        
        $this->load->helper('url');
        // $this->load->view('pembelian/.php');
        $data=$_SESSION['data'];
        $this->load->view('pembelian/tambah_pembelian.php',$data);
    }
}