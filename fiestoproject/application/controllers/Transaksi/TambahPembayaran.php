<?php
class TambahPembayaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        $data=$_SESSION['data'];
        $this->load->view('pembelian/pembayaran_pembelian.php',$data);
    }
}