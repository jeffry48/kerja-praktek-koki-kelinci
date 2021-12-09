<?php
class UbahPass extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('cookie', 'url'));
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        $this->load->helper('url');
        // $data['karyawan'] = $this->Karyawan->getFromSearch($nama,$posisi,$alamat,$nohp,$jk);
        $this->load->view('home/login.php');
    }
}