<?php
class buatLaporanperCustomer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Customer");
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        
        $this->load->helper('url');
        $data['karyawan'] = $this->Customer->getAll();
        
        $ids=$this->input->post('ids');
        $tgls=$this->input->post('tgs');
        $tgle=$this->input->post('tge');

        $query=$this->db->query('select * from djual d join hjual h on h.id_hjual = d.id_hjual 
        and h.id_konsumen = "'.$ids.'" and h.tanggal_jual between "'.$tgls.'" and "'.$tgle.'"');
        $result = $query->result_array();

        $data['karyawan1'] = $result;

        $this->load->view('laporan penjualan/laporan_per_customer.php',$data);
    }
}