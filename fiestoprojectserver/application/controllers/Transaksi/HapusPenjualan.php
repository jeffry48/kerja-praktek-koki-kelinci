<?php
class hapusPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
        $this->load->model("Kategori_model");
        $this->load->model("Pembayaran_Penjualan");
    }

    public function index()
    {
        
        $this->load->helper('url');
        // $this->load->view('penjualan/.php');
        $id=$this->input->post('idh');
        $this->Header_Jual->delete($id);
        $this->Detail_Jual->deletebyheader($id);
        $this->Pembayaran_Penjualan->deletebyheader($id);
        $data['karyawan'] = $this->Header_Jual->getAll();
        $data['karyawan1'] = $this->Detail_Jual->getAll();
        $data['karyawan2'] = $this->Kategori_model->getAllKategori();
        // $this->load->view('penjualan/cari_penjualan.php',$data);
        return redirect($this->config->item('backend_server_url')."transaksi/penjualan");
    }
}