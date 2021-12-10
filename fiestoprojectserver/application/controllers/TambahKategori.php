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
        $_SESSION['success']="berhasil tambah kategori";
        $this->session->mark_as_flash('success');
        $data['dataKategori'] = $this->kategori_model->getAllKategori();
        $_SESSION['dataKategori']=$data;
        return redirect(base_url()."TambahKategori");
    }
}