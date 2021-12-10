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
        // $this->load->view('kategori/kategori.php');
        return redirect(base_url()."kategori");
    }
}