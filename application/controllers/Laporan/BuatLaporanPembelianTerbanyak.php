<?php
class buatLaporanPembelianTerbanyak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
    }

    public function index()
    {
        
        $this->load->helper('url');
        $tgls=$this->input->post('tgs');
        $tgle=$this->input->post('tge');
        $query=$this->db->query('select * from dbeli d join hbeli h on h.id_hbeli = d.id_hbeli 
        and h.tanggal_beli between "'.$tgls.'" and "'.$tgle.'" GROUP BY id_supplier 
        ORDER BY COUNT(h.id_supplier) DESC
        LIMIT    1');
        $result = $query->result_array();
        $data['karyawan1'] = $result;
        $this->load->view('laporan pembelian/laporan_pembelian_terbanyak.php',$data);
    }
}