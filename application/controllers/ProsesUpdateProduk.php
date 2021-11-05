<?php
class prosesUpdateProduk extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("produk_model");
        $this->load->library('session');
    }

    public function index()
    {
        $idPro=$this->input->post('idPro');
        $namaPro=$this->input->post('namaPro');
        $hargaPro=$this->input->post('hargaPro');
        $katPro=$this->input->post('katPro');
        $this->produk_model->UpdatePro($idPro, $namaPro, $hargaPro, $katPro);
        redirect("produk");
    }
}