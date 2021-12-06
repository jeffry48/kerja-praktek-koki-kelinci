<?php
class laporanPerSupplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Supplier");
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        $this->load->helper('url');
        $data['karyawan'] = $this->Supplier->getAll();
        $data['karyawan1'] = $this->Detail_Beli->getAllDateDesc();
        $this->load->view('laporan pembelian/laporan_per_supplier.php',$data);
    }
}