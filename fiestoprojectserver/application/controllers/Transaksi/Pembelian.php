<?php
class pembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {  
        $this->load->helper('url');
        $data['karyawan'] = $this->Header_Beli->getAllDateDesc();
        $data['karyawan1'] = $this->Detail_Beli->getAllDateDesc();
        // $this->load->view('pembelian/cari_pembelian.php',$data);
        $_SESSION['data']=$data;
        return redirect(base_url()."transaksi/pembelian");
    }
}