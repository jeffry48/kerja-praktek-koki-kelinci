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

        $data['idSup']=$this->input->post('idSup');
        $data['tglBeli']=$this->input->post('tglBeli');

        var_dump($data['idSup']);
        var_dump($data['tglBeli']);

        $data['karyawan'] = $this->Detail_Beli->getByHeader($idh);
        // $this->load->view('pembelian/tambah_pembelian.php',$data);
        $_SESSION['data']=$data;
        return redirect(base_url()."transaksi/HapusDetailPembelian");
    }
}