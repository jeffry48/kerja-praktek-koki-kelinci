<?php
class UpdateSupplier extends CI_Controller {

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
        $id = $this->input->post('id');
        $nama=$this->input->post('nama');
        $alamat=$this->input->post('alamat');
        $nohp=$this->input->post('nohp');
        $update = $this->Supplier->update($id,$nama,$alamat,$nohp);
        ?>
            <script type="text/javascript">
                alert("Berhasil Update Supplier");
            </script>
        <?php
        $data['karyawan'] = $this->Supplier->getAll();
        $this->load->view('supplier/supplier.php',$data);

    }
}