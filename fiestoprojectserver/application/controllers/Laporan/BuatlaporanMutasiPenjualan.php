<?php
class BuatlaporanMutasiPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        $this->load->helper('url');
        $tgls=$this->input->post('tgs');
        $tgle=$this->input->post('tge');

        // $data['karyawan'] = $this->Header_Jual->getAll();
        // $data['karyawan1'] = $this->Detail_Jual->getAll();
        $sql3 ="select * from hjual h
        join djual d on d.id_hjual=h.id_hjual
        where h.tanggal_jual between '".$tgls."' and '".$tgle."'
        order by h.tanggal_jual desc";
        $query3 = $this->db->query($sql3); 
        $trans = $query3->result_array(); 
        $data['karyawan1']=$trans;
        
        $_SESSION['startDate']=$tgls;
        $_SESSION['endDate']=$tgle;

        $this->load->view('laporan penjualan/laporan_mutasi_penjualan.php',$data);
    }
}