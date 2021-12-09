<?php
class UpdateKategori extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("kategori_model");
        $this->load->library('session');
    }

    public function index()
    {
        $idKat=$this->input->post('idKat');
        $namaKat=$this->input->post('namaKat');
        echo $idKat;
        $this->kategori_model->updateKat($idKat, $namaKat);
        $_SESSION['success']="berhasil update kategori";
        $this->session->mark_as_flash('success');
        redirect("kategori");
    }
}