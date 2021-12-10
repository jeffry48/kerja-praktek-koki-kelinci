<?php
class laporanPembelianterbanyak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        
        $this->load->helper('url');
        $data['karyawan1'] = $this->Detail_Beli->getAllDateDesc();
        // $this->load->view('laporan pembelian/laporan_pembelian_terbanyak.php',$data);
        $_SESSION['data']=$data;
        return redirect(base_url()."laporan/LaporanPembelianTerbanyak");
    }
}