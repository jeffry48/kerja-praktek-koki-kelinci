<?php
class kePembayaranPembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
        $this->load->model("Pembayaran_Pembelian");
    }

    public function index()
    {
        $this->load->helper('url');
        $idh=$this->input->post('idh');
        $data['karyawan'] = $this->Header_Beli->getOneData($idh);
        $data['karyawan1'] = $this->Detail_Beli->getByHeader($idh);
        $data['karyawan2'] = $this->Pembayaran_Pembelian->getByHeader($idh);
        $this->load->view('pembelian/pembayaran_pembelian.php',$data);
    }
}