<?php
class UpdatePegawai extends CI_Controller {


    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        $this->load->helper('url');
        $this->load->view('employee/updatepegawai.php');
        
    }
}