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
        $query=$this->db->query('select h.id_konsumen from djual d join hjual h on h.id_hjual = d.id_hjual 
        and h.tanggal_jual between "'.$tgls.'" and "'.$tgle.'" GROUP BY id_konsumen 
        ORDER BY COUNT(h.id_konsumen) DESC
        LIMIT    1');
        $result = $query->result_array();

        $query2=$this->db->query('select * from hjual h 
                                    join djual d on h.id_hjual = d.id_hjual 
                                    where h.id_konsumen="'.$result[0]['id_konsumen'].'" and
                                    h.tanggal_jual between "'.$tgls.'" and "'.$tgle.'"
                                    order by h.tanggal_jual desc');
        $result2=$query2->result_array();
        // var_dump($result2);

        $data['karyawan1'] = $result2;
        $data['konsumen'] = $result;

        $_SESSION['startDate']=$tgls;
        $_SESSION['endDate']=$tgle;

        $this->load->view('laporan penjualan/laporan_penjualan_terbanyak.php',$data);
    }
}