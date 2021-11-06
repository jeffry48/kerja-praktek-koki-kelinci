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
        $count = $this->Customer->getCount() + 1;
        // echo $count;
        $str = (string) $count;
        $id = "";
        if($count < 10)
            $id = "CU000" . $str;
        else if ($count >= 10 && $count < 100)
            $id = "CU00" . $str;
        else if ($count >= 100 && $count < 1000)
            $id = "CU0" . $str;
        else 
            $id = "CU" . $str;
        // echo $id;
        $nama=$this->input->post('nama');
        $alamat=$this->input->post('alamat');
        $nohp=$this->input->post('nohp');
        $cookie = get_cookie("active_id");
        $tambah = $this->Customer->save($id,$cookie,$nama,$alamat,$nohp);
        ?>
            <script type="text/javascript">
                alert("Berhasil Tambah Konsumen Baru");
            </script>
        <?php
        $this->load->helper('url');
        $data['karyawan'] = $this->Customer->getAll();
        $this->load->view('konsumen/konsumen.php',$data);
    }
}