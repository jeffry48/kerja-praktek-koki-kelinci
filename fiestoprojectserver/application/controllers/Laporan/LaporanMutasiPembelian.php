<?php
class laporanMutasipembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        
        $this->load->helper('url');

        // $data['karyawan'] = $this->Header_Beli->getAll();
        // $data['karyawan1'] = $this->Detail_Beli->getAll();

        $sql3 ="select * from hbeli h
        join dbeli d on d.id_hbeli=h.id_hbeli
        order by h.tanggal_beli desc";
        $query3 = $this->db->query($sql3); 
        $trans = $query3->result_array(); 
        $data['karyawan1']=$trans;

        // $this->load->view('laporan pembelian/laporan_mutasi_pembelian.php',$data);
        $_SESSION['data']=$data;
        return redirect(base_url()."laporan/LaporanMutasiPembelian");
    }
}