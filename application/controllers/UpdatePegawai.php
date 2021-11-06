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
            <script type="text/javascript">
                alert("Berhasil Update Pegawai");
            </script>
        <?php
        $data['karyawan'] = $this->Karyawan->getAll();
        $this->load->view('employee/pegawai.php',$data);
    }
}