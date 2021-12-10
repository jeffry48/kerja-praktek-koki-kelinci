<?php
class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $data=$_SESSION['dataKategori'];
        $this->load->view('kategori/kategori.php',$data);
    }
}