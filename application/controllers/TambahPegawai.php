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
        $id = "";
        if(count($count) < 10)
            $id .= "KR000";
        else if (count($count) >= 10 && count($count) < 100)
            $id .= "KR00";
        else if (count($count) >= 100 && count($count) < 1000)
            $id .= "KR0";
        else 
            $id .= "KR";
        // echo $id;
        $nama=$this->input->post('nama');
        $posisi=$this->input->post('posisi');
        $alamat=$this->input->post('alamat');
        $jk=$this->input->post('jk');
        // $password=$this->input->post('password');
        $nohp=$this->input->post('nohp');
        $query2=$this->db->query("select max(substring(id_karyawan, 3)) from karyawan");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_karyawan, 3))"];
        $id.=($lastId+1);
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