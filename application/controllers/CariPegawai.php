<?php
class CariPegawai extends CI_Controller {

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
        // $this->load->helper('url');
        // $this->load->view('employee/updatekategori.php');
        $nama=$this->input->post('nama');
        $posisi=$this->input->post('posisi');
        $alamat=$this->input->post('alamat');
        $jk=$this->input->post('jk');
        $nohp=$this->input->post('nohp');
        $data['karyawan'] = $this->Karyawan->getFromSearch($nama,$posisi,$alamat,$nohp,$jk);
        $this->load->view('employee/pegawai.php',$data);
    }
}