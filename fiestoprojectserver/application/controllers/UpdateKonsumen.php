<?php
class UpdateKonsumen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Customer");
        $this->load->library('session');
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        $this->load->helper('url');
        $id = $this->input->post('id');
        $nama=$this->input->post('nama');
        $alamat=$this->input->post('alamat');
        $nohp=$this->input->post('nohp');
        $update = $this->Customer->update($id,$nama,$alamat,$nohp);
        ?>

        <?php
        $_SESSION['success']="berhasil update customer";
        $this->session->mark_as_flash('success');
        $data['karyawan'] = $this->Customer->getAll();
        $_SESSION['data']=$data;
        return redirect(base_url()."UpdateKonsumen");
        
    }
}