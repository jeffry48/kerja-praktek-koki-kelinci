<?php
class laporanPerSupplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        $data=$_SESSION['data'];
        // var_dump($data);
        $this->load->view('laporan pembelian/laporan_per_supplier.php',$data);
    }
}