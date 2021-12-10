<?php
class KeUpdatePegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Karyawan");
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        $id=$this->input->post('id');
        $data['karyawan'] = $this->Karyawan->getOneData($id);
        $_SESSION['data']=$data;
        return redirect(base_url()."KeUpdatePegawai");
    }
}