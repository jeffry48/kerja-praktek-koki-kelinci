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
        $_SESSION['success']="berhasil tambah produk";
        $this->session->mark_as_flash('success');
        redirect("produk");
    }
}