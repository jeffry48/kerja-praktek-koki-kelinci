<?php
class HapusPegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('URL');
        $data=$_SESSION['data'];
        $this->load->view('employee/pegawai.php',$data);
    }
}