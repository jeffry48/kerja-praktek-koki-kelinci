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
        $this->load->helper('url');
        $data['karyawan'] = $this->Supplier->getAll();
        $_SESSION['data']=$data;
        return redirect(base_url()."Supply");
    }
}