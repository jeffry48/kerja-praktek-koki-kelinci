<?php
class keUpdatePenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
        $this->load->model("Customer");
        $this->load->model("Produk_model");
    }

    public function index()
    {
        
        $this->load->helper('url');
        $idh=$this->input->post('idh');
        $data['karyawan'] = $this->Header_Jual->getOneData($idh);
        $data['karyawan1'] = $this->Detail_Jual->getByHeader($idh);
        $data['karyawan2'] = $this->Customer->getAll();
        $data['karyawan3'] = $this->Produk_model->getAllProduk();
        $this->load->view('penjualan/update_penjualan.php',$data);
        
    }
}