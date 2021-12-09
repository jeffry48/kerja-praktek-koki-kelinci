<?php
class keNotaPembelian extends CI_Controller {

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
        $tgl=$this->input->post('tgl');
        $ids=$this->input->post('ids');
        $stat=$this->input->post('stat');
        $total=$this->input->post('total');
        $data['karyawan'] = $this->Header_Beli->getOneData($idh);
        $data['karyawan1'] = $this->Detail_Beli->getByHeader($idh);
        $data['idh'] = $idh;
        $data['tgl'] = $tgl;
        $data['ids'] = $ids;
        $data['stat'] = $stat;
        $data['total'] = $total;
        // $this->load->view('pembelian/pembayaran_pembelian_sudah.php',$data);
        $_SESSION['data']=$data;
        return redirect(base_url()."transaksi/KeNotaPembelian");
    }
}