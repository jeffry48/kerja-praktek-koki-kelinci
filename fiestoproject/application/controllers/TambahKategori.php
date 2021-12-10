<?php
class TambahKategori extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('URL');
        $data=$_SESSION['dataKategori'];
        $this->load->view('kategori/kategori.php',$data);
    }
}