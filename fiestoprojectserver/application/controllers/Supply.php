<?php
class Supply extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Supplier");
        $this->load->library('session');
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        $this->load->helper('url');
        $data['karyawan'] = $this->Supplier->getAll();
        // echo $data['post'];
        $this->load->view('supplier/supplier.php',$data);
        
    }
}