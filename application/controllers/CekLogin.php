<?php
class cekLogin extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->library('session');
    }

    public function index()
    {
        // echo $this->input->post('username');
        $nama=$this->input->post('username');
        $pass=$this->input->post('password');
        $cekLogin = $this->login_model->cekLogin($nama, $pass);
        // var_dump($data["karyawan"]);
        
        if($cekLogin==true){
            redirect("home");
        }
        else{
            $_SESSION['gagalLogin'] = true;
            $this->session->mark_as_flash('gagalLogin');
            redirect("login");
        }
    }
}