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
        $query=$this->db->query('select h.id_supplier from dbeli d join hbeli h on h.id_hbeli = d.id_hbeli 
        and h.tanggal_beli between "'.$tgls.'" and "'.$tgle.'" GROUP BY id_supplier 
        ORDER BY COUNT(h.id_supplier) DESC
        LIMIT 1');
        $result = $query->result_array();
        $query2=$this->db->query('select * from hbeli h 
                                    join dbeli d on h.id_hbeli = d.id_hbeli 
                                    where h.id_supplier="'.$result[0]['id_supplier'].'"');

        $result2 = $query2->result_array();
        // var_dump($result[0]);
        $data['karyawan1'] = $result2;
        $data['supplier']=$result;

        $_SESSION['startDate']=$tgls;
        $_SESSION['endDate']=$tgle;

        $this->load->view('laporan pembelian/laporan_pembelian_terbanyak.php',$data);
    }
}