<?php
class BuatlaporanMutasiPembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        $this->load->helper('url');
        $tgls=$this->input->post('tgs');
        $tgle=$this->input->post('tge');

        $sql3 ="select * from hbeli h
                join dbeli d on d.id_hbeli=h.id_hbeli
                where h.tanggal_beli between '".$tgls."' and '".$tgle."'
                order by h.tanggal_beli desc";
                
        $query3 = $this->db->query($sql3); 
        $trans = $query3->result_array(); 
        $data['karyawan1']=$trans;
        
        $_SESSION['startDate']=$tgls;
        $_SESSION['endDate']=$tgle;

        // $this->load->view('laporan pembelian/laporan_mutasi_pembelian.php',$data);
        $_SESSION['data']=$data;
        return redirect(base_url()."laporan/BuatlaporanMutasiPembelian");
    }
}