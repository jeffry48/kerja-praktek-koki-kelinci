<?php
class keNotaPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        
        $this->load->helper('url');
        $idh=$this->input->post('idh');
        $tgl=$this->input->post('tgl');
        $ids=$this->input->post('ids');
        $stat=$this->input->post('stat');
        $total=$this->input->post('total');
        $data['karyawan'] = $this->Header_Jual->getOneData($idh);
        $data['karyawan1'] = $this->Detail_Jual->getByHeader($idh);
        $data['idh'] = $idh;
        $data['tgl'] = $tgl;
        $data['ids'] = $ids;
        $data['stat'] = $stat;
        $data['total'] = $total;
        // $this->load->view('penjualan/pembayaran_penjualan_sudah.php',$data);
        $_SESSION['data']=$data;
        return redirect(base_url()."transaksi/KeNotaPenjualan");
        
    }
}