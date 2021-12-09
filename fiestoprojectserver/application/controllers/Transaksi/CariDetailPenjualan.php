<?php
class cariDetailpenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        $this->load->helper('url');
        $idd=$this->input->post('idd');
        $idp=$this->input->post('idp');
        $kat=$this->input->post('kat');
        $hst=$this->input->post('hst');
        $hse=$this->input->post('hse');
        $jst=$this->input->post('jst');
        $jse=$this->input->post('jse');
        $sst=$this->input->post('sst');
        $sse=$this->input->post('sse');
        $data['karyawan1'] = $this->Detail_Jual->searchDet($idd, $idp, $kat, $hst, $hse, $jst, $jse, $sst, $sse);
        $data['karyawan']=[];
        foreach ($data['karyawan1'] as $p) {
            $getData=$this->Header_Jual->getOneData($p['id_hjual']);
            array_push($data['karyawan'], $getData[0]);
        }
        $this->load->view('penjualan/cari_penjualan.php',$data);
        
    }
}