<?php
class buatLaporanperSupplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Supplier");
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        
        $this->load->helper('url');
        $data['karyawan'] = $this->Supplier->getAll();

        $ids=$this->input->post('ids');
        $tgls=$this->input->post('tgs');
        $tgle=$this->input->post('tge');

        $query=$this->db->query('select * from dbeli d join hbeli h on h.id_hbeli = d.id_hbeli 
        and h.id_supplier = "'.$ids.'" and h.tanggal_beli between "'.$tgls.'" and "'.$tgle.'"');
        $result = $query->result_array();

        $data['karyawan1'] = $result;
        
        $this->load->view('laporan pembelian/laporan_per_supplier.php',$data);
    }
}