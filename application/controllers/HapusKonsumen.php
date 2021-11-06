<?php
class HapusKonsumen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Customer");
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        $id=$this->input->post('id');
        $this->Customer->delete($id);
        $data['karyawan'] = $this->Customer->getAll();
        $this->load->view('konsumen/konsumen.php',$data);
    }
}