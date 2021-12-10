<?php
class KeUpdatePegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        $this->load->helper('URL');
        $data=$_SESSION['data'];
        $this->load->view('employee/updatepegawai.php',$data);
    }
}