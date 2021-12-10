<?php
class HapusPegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Karyawan");
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        $id=$this->input->post('id');
        $this->Karyawan->delete($id);
        $data['karyawan'] = $this->Karyawan->getAll();
        $_SESSION['data']=$data;
        return redirect(base_url()."HapusPegawai");
    }
}