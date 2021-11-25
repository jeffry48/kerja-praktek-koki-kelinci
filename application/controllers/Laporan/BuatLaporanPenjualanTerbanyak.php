<?php
class buatLaporanPenjualanterbanyak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
    }

    public function index()
    {
        
        $this->load->helper('url');
        $tgls=$this->input->post('tgs');
        $tgle=$this->input->post('tge');
        $query=$this->db->query('select * from djual d join hjual h on h.id_hjual = d.id_hjual 
        and h.tanggal_jual between "'.$tgls.'" and "'.$tgle.'" GROUP BY id_konsumen 
        ORDER BY COUNT(h.id_konsumen) DESC
        LIMIT    1');
        $result = $query->result_array();
        $data['karyawan1'] = $result;
        $this->load->view('laporan penjualan/laporan_penjualan_terbanyak.php',$data);
    }
}