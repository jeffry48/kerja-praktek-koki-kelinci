<?php
class UpdateKonsumen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('URL');
        $data=$_SESSION['data'];
        $this->load->view('konsumen/konsumen.php',$data);
    }
}