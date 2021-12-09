<?php
class CariProduk extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("kategori_model");
        $this->load->model("produk_model");
        $this->load->library('session');
    }

    public function index()
    {
        $keyword=$this->input->post('keyword');
        $hargaStart=$this->input->post('hargaStart');
        $hargaEnd=$this->input->post('hargaEnd');
        $kategoriPro=$this->input->post('kategoriPro');

        $_SESSION['hasilSearchPro']=$this->produk_model->searchPro($keyword, $hargaStart, $hargaEnd, $kategoriPro);
        $this->session->mark_as_flash('hasilSearchPro');

        // var_dump($_SESSION['hasilSearchPro']);

        redirect('produk');
    }
}