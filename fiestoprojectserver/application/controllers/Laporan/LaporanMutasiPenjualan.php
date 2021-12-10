<?php
class laporanMutasiPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        $this->load->helper('url');

        // $data['karyawan'] = $this->Header_Jual->getAll();
        // $data['karyawan1'] = $this->Detail_Jual->getAll();
        $sql3 ="select * from hjual h
        join djual d on d.id_hjual=h.id_hjual
        order by h.tanggal_jual desc";
        $query3 = $this->db->query($sql3); 
        $trans = $query3->result_array();
        $data['karyawan1']=$trans;

        // $this->load->view('laporan penjualan/laporan_mutasi_penjualan.php',$data);
        $_SESSION['data']=$data;
        return redirect(base_url()."laporan/LaporanMutasiPenjualan");
    }
}