<?php
class TambahKonsumen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        $this->load->helper('URL');
        $data=$_SESSION['data'];
        $this->load->view('konsumen/konsumen.php',$data);
    }
}