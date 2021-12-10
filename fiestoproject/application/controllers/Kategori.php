<?php
class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        // var_dump($allKat);
        $this->load->helper('url');
        $this->load->view('kategori/kategori.php');
    }
}