<?php
class cariPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        
        $this->load->helper('url');
        // $this->load->view('penjualan/.php');
        $idh=$this->input->post('idh');
        $ids=$this->input->post('ids');
        $tgls=$this->input->post('tgls');
        $tgle=$this->input->post('tgle');
        $tots=$this->input->post('tots');
        $tote=$this->input->post('tote');
        $stat=$this->input->post('status');
        $data['karyawan'] = $this->Header_Jual->getFromSearch($idh,$ids,$tgls,$tgle,$tots,$tote,$stat);
        $this->load->view('penjualan/cari_penjualan.php',$data);
    }
}