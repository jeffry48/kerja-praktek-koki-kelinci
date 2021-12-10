<?php
class KeTambahKonsumen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('konsumen/tambahkonsumen.php');
    }
}