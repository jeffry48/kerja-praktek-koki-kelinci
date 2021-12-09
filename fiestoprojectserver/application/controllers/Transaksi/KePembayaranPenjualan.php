<?php
class kePembayaranpenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
        $this->load->model("Pembayaran_Penjualan");
    }

    public function index()
    {
        $this->load->helper('url');
        $idh=$this->input->post('idh');
        $data['karyawan'] = $this->Header_Jual->getOneData($idh);
        $data['karyawan1'] = $this->Detail_Jual->getByHeader($idh);
        $data['karyawan2'] = $this->Pembayaran_Penjualan->getByHeader($idh);
        // $this->load->view('penjualan/pembayaran_penjualan.php',$data);
        $_SESSION['data']=$data;
        redirect(base_url()."transaksi/KePembayaranPenjualan");
        
    }
}