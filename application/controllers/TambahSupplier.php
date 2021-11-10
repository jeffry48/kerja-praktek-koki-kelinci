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
        
        // echo $id;
        $nama=$this->input->post('nama');
        $alamat=$this->input->post('alamat');
        $nohp=$this->input->post('nohp');
        $query2=$this->db->query("select max(substring(id_supplier, 3)) from supplier");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_supplier, 3))"];
        $lastId+=1;
        $id = "";
        if($lastId < 10)
            $id .= "SU000";
        else if ($lastId>= 10 && $lastId < 100)
            $id .= "SU00";
        else if ($lastId >= 100 && $lastId < 1000)
            $id .= "SU0";
        else 
            $id .= "SU";
        $id.=($lastId);
        $tambah = $this->Supplier->save($id,$nama,$alamat,$nohp);
        ?>

        <?php
        $_SESSION['success']="berhasil tambah supplier";
        $this->session->mark_as_flash('success');
        $this->load->helper('url');
        $data['karyawan'] = $this->Supplier->getAll();
        $this->load->view('supplier/supplier.php',$data);
    }
}