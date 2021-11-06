<?php
class CariKonsumen extends CI_Controller {

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
        // $this->load->helper('url');
        // $this->load->view('employee/updatekategori.php');
        $nama=$this->input->post('nama');
        $alamat=$this->input->post('alamat');
        $nohp=$this->input->post('nohp');
        $data['karyawan'] = $this->Customer->getFromSearch($nama,$alamat,$nohp);
        $this->load->view('konsumen/konsumen.php',$data);
    }

}