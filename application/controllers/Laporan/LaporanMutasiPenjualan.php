<?php
class laporanMutasiPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        $this->load->helper('url');
        $data['karyawan'] = $this->Header_Jual->getAll();
        $data['karyawan1'] = $this->Detail_Jual->getAll();
        $this->load->view('laporan penjualan/laporan_mutasi_penjualan.php',$data);
    }
}