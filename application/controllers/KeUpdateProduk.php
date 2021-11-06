<?php
class keUpdateProduk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("kategori_model");
        $this->load->model("produk_model");
        $this->load->library('session');
    }
    public function index()
    {
        $allKat=$this->kategori_model->getAllkategori();
        $_SESSION['dataKategori'] = $allKat;

        $idPro=$this->input->post('idPro');
        $_SESSION['currProData']=$this->produk_model->getByIdPro($idPro);
        $this->load->helper('url');
        $this->load->view('produk/updateproduk.php');
    }
}