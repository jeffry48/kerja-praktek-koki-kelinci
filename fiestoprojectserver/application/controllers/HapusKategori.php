<?php
class HapusKategori extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("kategori_model");
        $this->load->library('session');
    }

    public function index()
    {
        $idKat=$this->input->post('idKat');
        $this->kategori_model->deleteKat($idKat);
        redirect($this->config->item('backend_server_url')."kategori");
    }
}