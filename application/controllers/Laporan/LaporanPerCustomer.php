<?php
class laporanPerCustomer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Customer");
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        $this->load->helper('url');
        $data['karyawan'] = $this->Customer->getAll();
        $data['karyawan1'] = $this->Detail_Jual->getAllDateDesc();
        $this->load->view('laporan penjualan/laporan_per_customer.php',$data);
        
    }
}