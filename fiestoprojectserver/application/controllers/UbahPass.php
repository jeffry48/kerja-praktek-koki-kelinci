<?php
class UbahPass extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Karyawan");
        $this->load->library('session');
        $this->load->helper(array('cookie', 'url'));
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        // $this->load->helper('url');
        // $this->load->view('employee/updatekategori.php');
        $cookieData = get_cookie("active_id");
        // echo $cookieData;
        $passlama= $this->input->post('passlama');
        $passbaru= $this->input->post('passbaru');
        $cekpasslama = $this->Karyawan->cekPassLama($cookieData,$passlama);
        // echo $cekpasslama;
        if($cekpasslama > 0)
        {
            $updatepass = $this->Karyawan->updatepassbaru($cookieData,$passbaru);
            // echo "a";
        }
        ?>
            <script type="text/javascript">
                alert("Berhasil Ubah Password");
            </script>
        <?php
        // $data['karyawan'] = $this->Karyawan->getFromSearch($nama,$posisi,$alamat,$nohp,$jk);
        $this->load->view('home/login.php');
    }
}