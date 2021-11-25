<?php
class laporanMutasipembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        
        $this->load->helper('url');
        $data['karyawan'] = $this->Header_Beli->getAll();
        $data['karyawan1'] = $this->Detail_Beli->getAll();
        $this->load->view('laporan pembelian/laporan_mutasi_pembelian.php',$data);
    }
}