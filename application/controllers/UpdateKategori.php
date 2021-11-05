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

        $_SESSION['currKatData']=$this->kategori_model->getByIdkat($idKat);
        $this->load->helper('url');
        $this->load->view('kategori/updatekategori.php');
        
    }
}