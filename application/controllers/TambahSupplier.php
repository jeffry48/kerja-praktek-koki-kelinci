<?php
class TambahSupplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Supplier");
        $this->load->library('session');
        // $this->load->helper('url');
        // $this->load->view('employee/tambahpegawai.php');
    }

    public function index()
    {
        // redirect(base_url() . 'login');
        // $this->load->helper('URL');
        $count = $this->Supplier->getCount() + 1;
        // echo $count;
        $str = (string) $count;
        $id = "";
        if($count < 10)
            $id = "SU000" . $str;
        else if ($count >= 10 && $count < 100)
            $id = "SU00" . $str;
        else if ($count >= 100 && $count < 1000)
            $id = "SU0" . $str;
        else 
            $id = "SU" . $str;
        // echo $id;
        $nama=$this->input->post('nama');
        $alamat=$this->input->post('alamat');
        $nohp=$this->input->post('nohp');
        $tambah = $this->Supplier->save($id,$nama,$alamat,$nohp);
        ?>
            <script type="text/javascript">
                alert("Berhasil Tambah Supplier");
            </script>
        <?php
        $this->load->helper('url');
        $data['karyawan'] = $this->Supplier->getAll();
        $this->load->view('supplier/supplier.php',$data);
    }
}