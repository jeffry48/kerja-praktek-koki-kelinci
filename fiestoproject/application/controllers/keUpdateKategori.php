<?php
class keUpdateKategori extends CI_Controller {
    
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('kategori/updatekategori.php');
        
    }
}