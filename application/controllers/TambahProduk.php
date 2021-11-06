<?php
class TambahProduk extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model("produk_model");
        $this->load->library('session');
    }

    public function index()
    {
        $namaKat=$this->input->post('namaPro');
        $hargaPro=$this->input->post('hargaPro');
        $katPro=$this->input->post('kategoriPro');
        // echo $katPro;
        $this->produk_model->insertNewPro($namaKat, $hargaPro, $katPro);
        redirect("produk");
    }
}