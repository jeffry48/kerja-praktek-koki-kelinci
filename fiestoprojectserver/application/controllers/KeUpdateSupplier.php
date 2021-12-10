<?php
class KeUpdateSupplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Supplier");
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        $id=$this->input->post('id');
        $data['karyawan'] = $this->Supplier->getOneData($id);
        $_SESSION['data']=$data;
        return redirect(base_url()."KeUpdateSupplier");
    }
}