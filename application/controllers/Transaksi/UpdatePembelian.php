<?php
class Updatepembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        $this->load->helper('url');
        $idh=$this->input->post('idh');
        $ids=$this->input->post('ids');
        $tglp=$this->input->post('tglp');
        $update = $this->Header_Beli->updatesuppliertglp($idh,$ids,$tglp);
        // $update1 = $this->Detail_Beli->updateheader($idh,$ids,$tglp);
        // $data['karyawan'] = $this->Header_Beli->getOneData($idh);
        // $data['karyawan1'] = $this->Detail_Beli->getByHeader($idh);
        // $this->load->view('pembelian/cari_pembelian.php',$data);
        redirect("transaksi/pembelian");
    }
}