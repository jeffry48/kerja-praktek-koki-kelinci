<?php
class cariDetailPembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Detail_Beli");
        $this->load->model("Header_Beli");
    }

    public function index()
    {
        
        $this->load->helper('url');
        $idd=$this->input->post('idd');
        $idh=$this->input->post('idh');
        $nama=$this->input->post('nama');
        $hst=$this->input->post('hst');
        $hse=$this->input->post('hse');
        $jst=$this->input->post('jst');
        $jse=$this->input->post('jse');
        $sst=$this->input->post('sst');
        $sse=$this->input->post('sse');
        $data['karyawan1'] = $this->Detail_Beli->searchDet($idd, $idh, $nama, $hst, $hse, $jst, $jse, $sst, $sse);
        $data['karyawan']=[];
        foreach ($data['karyawan1'] as $p) {
            $getData=$this->Header_Beli->getOneData($p['id_hbeli']);
            array_push($data['karyawan'], $getData[0]);
        }
        // var_dump($data['karyawan'][0]);
        $this->load->view('pembelian/cari_pembelian.php',$data);
        
    }
}