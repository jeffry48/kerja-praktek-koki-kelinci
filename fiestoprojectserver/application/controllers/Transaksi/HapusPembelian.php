<?php
class hapusPembelian extends CI_Controller {

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
        // $this->load->view('pembelian/.php');
        $id=$this->input->post('idh');
        $this->Header_Beli->delete($id);
        $this->Detail_Beli->deletebyheader($id);
        $this->Pembayaran_Pembelian->deletebyheader($id);
        $data['karyawan'] = $this->Header_Beli->getAll();
        // $this->load->view('pembelian/cari_pembelian.php',$data);
        return redirect($this->config->item('backend_server_url')."transaksi/pembelian");
    }
}