<?php
class updateDetailPembelian extends CI_Controller {

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
        $idd=$this->input->post('idd');
        $nama=$this->input->post('keterangan');
        $harga=$this->input->post('harga');
        $jumlah=$this->input->post('jumlah');
        $subtotal=(int)$harga*(int)$jumlah;

        $this->Detail_Beli->update($nama, $jumlah, $subtotal, $idd);

        $data['idSup']=$this->input->post('idSup');
        $data['tglBeli']=$this->input->post('tglBeli');


        $data['karyawan'] = $this->Header_Beli->getOneData($idh);
        $data['karyawan1'] = $this->Detail_Beli->getByHeader($idh);
        $this->load->view('pembelian/update_pembelian.php',$data);
    }
}