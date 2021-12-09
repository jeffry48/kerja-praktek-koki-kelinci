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
        $count = $this->Karyawan->getAll();
        $str = (string) count($count)+1;
        // $str = (string) $count;

        // echo $id;
        $nama=$this->input->post('nama');
        $pass=$this->input->post('password');
        $posisi=$this->input->post('posisi');
        $alamat=$this->input->post('alamat');
        $jk=$this->input->post('jk');
        // $password=$this->input->post('password');
        $nohp=$this->input->post('nohp');
        $query2=$this->db->query("select max(substring(id_karyawan, 3)) from karyawan");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_karyawan, 3))"];
        $lastId+=1;
        $id = "";
        if($lastId < 10)
            $id .= "KR000";
        else if ($lastId >= 10 && $lastId < 100)
            $id .= "KR00";
        else if ($lastId >= 100 && $lastId < 1000)
            $id .= "KR0";
        else 
            $id .= "KR";

        $id.=($lastId);
        $tambah = $this->Karyawan->save($id,$nama,$pass,$posisi,$alamat,$nohp,$jk);
        ?>
        <!-- <script>
            alert("tambah pegawai berhasil");
        </script> -->
        <?php
        $_SESSION['success']="berhasil tambah pegawai";
        $this->session->mark_as_flash('success');
        $data['karyawan'] = $this->Karyawan->getAll();
        // $this->load->view('employee/pegawai.php',$data);
        redirect('pegawai');
    }
}