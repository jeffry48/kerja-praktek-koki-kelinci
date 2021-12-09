<?php
class cekLogin extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("Karyawan");
        $this->load->library('session');
        $this->load->helper(array('cookie', 'url'));
    }

    public function index()
    {
        $nama=$this->input->post('username');
        $pass=$this->input->post('password');
        $cekLogin = $this->login_model->cekLogin($nama, $pass);
        $user['karyawan'] = $this->Karyawan->cekDataLogin($nama,$pass);
        // print_r($user['karyawan'][0]['id_karyawan']);
        
        if($cekLogin==true){
            $this->load->helper('cookie');
            $cookie = array(
                'name'   => 'active_id',
                'value'  => $user['karyawan'][0]['id_karyawan'],
                'expire' => '86400',
                'prefix' => ''
            );
            $this->input->set_cookie($cookie);
            $_SESSION['loggedInId']=$user['karyawan'][0]['id_karyawan'];
            $_SESSION['loggedInName']=$user['karyawan'][0]['nama_karyawan'];
            // echo $_SESSION['loggedIn'];
            redirect("home");
        }
        else{
            $_SESSION['gagalLogin'] = true;
            $this->session->mark_as_flash('gagalLogin');
            redirect("login");
        }
    }
}