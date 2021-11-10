<?php
class TambahKonsumen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Customer");
        $this->load->library('session');
        $this->load->helper(array('cookie', 'url'));
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        $count = $this->Customer->getAll();
        // echo $count;
        // $str = (string) count($count)+1;
        $id = "";
        if(count($count) < 10)
            $id .= "CU000";
        else if (count($count) >= 10 && count($count) < 100)
            $id .= "CU00";
        else if (count($count) >= 100 && count($count) < 1000)
            $id .= "CU0";
        else 
            $id .= "CU";
        // echo $id;
        $nama=$this->input->post('nama');
        $alamat=$this->input->post('alamat');
        $nohp=$this->input->post('nohp');
        $cookie = get_cookie("active_id");
        $query2=$this->db->query("select max(substring(id_konsumen, 3)) from konsumen");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_konsumen, 3))"];
        $id.=($lastId+1);
        $tambah = $this->Customer->save($id,$cookie,$nama,$alamat,$nohp);
        ?>
            <script type="text/javascript">
                alert("Berhasil Tambah Konsumen Baru");
            </script>
        <?php
        $_SESSION['success']="berhasil tambah customer";
        $this->session->mark_as_flash('success');
        $this->load->helper('url');
        $data['karyawan'] = $this->Customer->getAll();
        $this->load->view('konsumen/konsumen.php',$data);
    }
}