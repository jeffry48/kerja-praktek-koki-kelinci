<?php
class laporanpenjualanterbanyak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        
        $this->load->helper('url');
        $data['karyawan1'] = $this->Detail_Jual->getAll();
        $this->load->view('laporan penjualan/laporan_penjualan_terbanyak.php',$data);
        
    }
}