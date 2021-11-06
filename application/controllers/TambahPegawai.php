<?php
class TambahPegawai extends CI_Controller {

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
        $count = $this->Karyawan->getCount() + 1;
        // echo $count;
        $str = (string) $count;
        $id = "";
        if($count < 10)
            $id = "KR000" . $str;
        else if ($count >= 10 && $count < 100)
            $id = "KR00" . $str;
        else if ($count >= 100 && $count < 1000)
            $id = "KR0" . $str;
        else 
            $id = "KR" . $str;
        // echo $id;
        $nama=$this->input->post('nama');
        $posisi=$this->input->post('posisi');
        $alamat=$this->input->post('alamat');
        $jk=$this->input->post('jk');
        // $password=$this->input->post('password');
        $nohp=$this->input->post('nohp');
        $tambah = $this->Karyawan->save($id,$nama,'1',$posisi,$alamat,$nohp,$jk);
        ?>
            <script type="text/javascript">
                alert("Berhasil Tambah Pegawai");
            </script>
        <?php
        $this->load->helper('url');
        $data['karyawan'] = $this->Karyawan->getAll();
        $this->load->view('employee/pegawai.php',$data);
    }
}