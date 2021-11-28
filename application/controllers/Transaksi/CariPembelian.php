<?php
class cariPembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        // $this->load->helper('url');
        $idh=$this->input->post('idh');
        $ids=$this->input->post('ids');
        $tgls=$this->input->post('tgls');
        $tgle=$this->input->post('tgle');
        $tots=$this->input->post('tots');
        $tote=$this->input->post('tote');
        $stat=$this->input->post('status');
        $data['karyawan'] = $this->Header_Beli->searchHead($idh,$ids,$tgls,$tgle,$tots,$tote,$stat);
        $this->load->view('pembelian/cari_pembelian.php',$data);
    }
}