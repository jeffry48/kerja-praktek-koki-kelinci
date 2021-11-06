<?php
class TambahKategori extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model("kategori_model");
        $this->load->library('session');
    }

    public function index()
    {
        $namaKat=$this->input->post('namaKategori');
        // echo $namaKat;
        $this->kategori_model->insertNewKat($namaKat);
        redirect("kategori");
    }
}