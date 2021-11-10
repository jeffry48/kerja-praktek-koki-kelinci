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
        $count = $this->Supplier->getAll();
        // echo $count;
        $id = "";
        if(count($count) < 10)
            $id .= "SU000";
        else if (count($count) >= 10 && count($count) < 100)
            $id .= "SU00";
        else if (count($count) >= 100 && count($count) < 1000)
            $id .= "SU0";
        else 
            $id .= "SU";
        // echo $id;
        $nama=$this->input->post('nama');
        $alamat=$this->input->post('alamat');
        $nohp=$this->input->post('nohp');
        $query2=$this->db->query("select max(substring(id_supplier, 3)) from supplier");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_supplier, 3))"];
        $id.=($lastId+1);
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