<?php
class UbahPass extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('URL');
        $this->load->view('home/login.php');
    }
}