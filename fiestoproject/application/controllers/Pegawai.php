<?php
class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        $data=$_SESSION['data'];
        $this->load->view('employee/pegawai.php',$data);
    }
}