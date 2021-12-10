<?php
class Konsumen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Customer");
        $this->load->library('session');
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        $this->load->helper('url');
        $data['karyawan'] = $this->Customer->getAll();
        $_SESSION['data']=$data;
        return redirect(base_url()."Konsumen");
        
    }
}