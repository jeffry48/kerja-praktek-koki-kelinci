<?php
class hapusPembelian extends CI_Controller {

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
        $id=$this->input->post('idh');
        $this->Header_Beli->delete($id);
        $this->Detail_Beli->deletebyheader($id);
        $data['karyawan'] = $this->Header_Beli->getAll();
        $this->load->view('pembelian/cari_pembelian.php',$data);
    }
}