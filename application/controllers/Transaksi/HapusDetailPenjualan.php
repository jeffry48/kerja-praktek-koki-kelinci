<?php
class hapusDetailPenjualan extends CI_Controller {

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
        // $this->load->view('pembelian/.php');
        $idd=$this->input->post('idd');
        $idh=$this->input->post('idh');
        $this->Detail_Jual->delete($idd);
        $data['karyawan'] = $this->Detail_Jual->getByHeader($idh);
        $data['karyawan1'] = $this->Customer->getAll();
        $data['karyawan2'] = $this->Produk_model->getAllProduk();


        $data['idKon']=$this->input->post('idKon');
        $data['tglJual']=$this->input->post('tglJual');

        $this->load->view('penjualan/tambah_penjualan.php',$data);
    }
}