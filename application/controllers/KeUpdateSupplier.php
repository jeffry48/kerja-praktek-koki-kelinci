<?php
class KeUpdateSupplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Supplier");
        $this->load->library('session');
        // $this->load->model("Pegawai");
        // $this->load->library('session');
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        $this->load->helper('url');
        $id=$this->input->post('id');
        $data['karyawan'] = $this->Supplier->getOneData($id);
        $this->load->view('supplier/updatesupplier.php',$data);
    }
}