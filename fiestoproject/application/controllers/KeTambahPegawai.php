<?php
class KeTambahPegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model("Pegawai");
        // $this->load->library('session');
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('employee/tambahpegawai.php');
    }
}