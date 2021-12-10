<?php
class HapusSupplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Supplier");
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        $id=$this->input->post('id');
        $this->Supplier->delete($id);
        $data['karyawan'] = $this->Supplier->getAll();
        $_SESSION['data']=$data;
        return redirect(base_url()."HapusSupplier");
    }

}