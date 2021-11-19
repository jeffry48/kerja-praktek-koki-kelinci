<?php
class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Karyawan");
        $this->load->library('session');
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        $this->load->helper('url');
        $data['karyawan'] = $this->Karyawan->getAll();
        // var_dump($data['karyawan']);
        // echo $data['post'];
        $this->load->view('employee/pegawai.php',$data);
    }
}