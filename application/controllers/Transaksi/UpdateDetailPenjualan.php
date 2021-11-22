<?php
class updateDetailPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Detail_Jual");
        $this->load->model("Header_Jual");
        $this->load->model("produk_model");
        $this->load->model("Customer");
        $this->load->model("Produk_model");
    }

    public function index()
    {
        $this->load->helper('url');
        $idh=$this->input->post('idh');
        $idd=$this->input->post('idd');
        $idPro=$this->input->post('produk');
        $jumlah=$this->input->post('jumlah');
        $harga=$this->produk_model->getByIdPro($idPro);
        $subtotal=(int)$harga['harga_produk']*(int)$jumlah;

        $this->Detail_Jual->update($jumlah, $subtotal, $idPro, $idd);

        $data['karyawan'] = $this->Header_Jual->getOneData($idh);
        $data['karyawan1'] = $this->Detail_Jual->getByHeader($idh);
        $data['karyawan2'] = $this->Customer->getAll();
        $data['karyawan3'] = $this->Produk_model->getAllProduk();
        // $data['karyawan'] = $this->Header_Beli->getOneData($idh);
        // $data['karyawan1'] = $this->Detail_Beli->getByHeader($idh);

        $data['idKon']=$this->input->post('idKon');
        $data['tglJual']=$this->input->post('tglJual');

        // var_dump($data['idKon']);
        // var_dump($data['tglJual']);

        $this->load->view('penjualan/update_penjualan.php',$data);
        
    }
}