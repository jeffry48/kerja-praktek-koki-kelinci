<?php
class hapusDetailPembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        
        $this->load->helper('url');
        // $this->load->view('pembelian/.php');
        $idd=$this->input->post('idd');
        $idh=$this->input->post('idh');
        $this->Detail_Beli->delete($idd);
        $data['karyawan'] = $this->Detail_Beli->getByHeader($idh);
        $this->load->view('pembelian/tambah_pembelian.php',$data);
    }
}