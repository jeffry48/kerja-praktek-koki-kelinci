<?php
class KeUpdateKonsumen extends CI_Controller {

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
        $id=$this->input->post('id');
        $data['karyawan'] = $this->Customer->getOneData($id);
        // $update = $this->Karyawan->update($id,$data['nama_karyawan'],$data['password_karyawan'],
        // $data['jabatan_karyawan'],$data['alamat_karyawan'],$data['no_telp_karyawan'],$data['jk_karyawan']);
        // $update = $this->Karyawan->update($id,$nama,$password,$posisi,$alamat,$nohp,$jk);
        // echo $id . " - " . $data['karyawan'];
        // var_dump($data['karyawan']);
        $this->load->view('konsumen/updatekonsumen.php',$data);
    }
}