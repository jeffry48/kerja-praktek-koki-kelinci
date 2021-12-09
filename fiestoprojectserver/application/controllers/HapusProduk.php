<?php
class HapusProduk extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("produk_model");
        $this->load->library('session');
    }

    public function index()
    {
        $idPro=$this->input->post('idPro');
        $this->produk_model->deletePro($idPro);
        redirect('produk');
        
    }
}