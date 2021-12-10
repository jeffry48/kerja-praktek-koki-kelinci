<?php
class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("kategori_model");
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        $data = $this->kategori_model->getAllKategori();
        $_SESSION['dataKategori']=$data;
        return redirect(base_url()."Kategori");
    }
}