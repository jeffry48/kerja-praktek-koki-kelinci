<?php
class UpdatePegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Karyawan");
        $this->load->library('session');
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        $id = $this->input->post('id');
        $nama=$this->input->post('nama');
        $posisi=$this->input->post('posisi');
        $alamat=$this->input->post('alamat');
        $jk=$this->input->post('jk');
        //$password=$this->input->post('password');
        $nohp=$this->input->post('nohp');
        $update = $this->Karyawan->update($id,$nama,$posisi,$alamat,$nohp,$jk);
        ?>
        
        <?php
        $_SESSION['success']="berhasil update pegawai";
        $this->session->mark_as_flash('success');
        $data['karyawan'] = $this->Karyawan->getAll();
        $_SESSION['data']=$data;
        return redirect(base_url()."UpdatePegawai");
    }
}