<?php
class cariKategori extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model("kategori_model");
        $this->load->library('session');
    }

    public function index()
    {
        $keyword=$this->input->post('keyword');
        $_SESSION['hasilSearchkat'] = $this->kategori_model->searchKat($keyword);
        // var_dump($_SESSION['hasilSearchkat']);
        redirect($this->config->item('backend_server_url')."kategori");
    }
}