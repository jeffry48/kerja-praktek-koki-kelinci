<?php
class cariPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        
        $this->load->helper('url');
        // $this->load->view('penjualan/.php');
        $idh=$this->input->post('idh');
        $idk=$this->input->post('idk');
        $tgls=$this->input->post('tgls');
        $tgle=$this->input->post('tgle');
        $tots=$this->input->post('tots');
        $tote=$this->input->post('tote');
        $stat=$this->input->post('status');

        $idd=$this->input->post('idd');
        $idp=$this->input->post('idp');
        $kat=$this->input->post('kat');
        $hst=$this->input->post('hst');
        $hse=$this->input->post('hse');
        $jst=$this->input->post('jst');
        $jse=$this->input->post('jse');
        $sst=$this->input->post('sst');
        $sse=$this->input->post('sse');
        $data['karyawan1'] = $this->Header_Jual->searchHead($idh,$idk,$tgls,$tgle,$tots,$tote,$stat,
                                                $idd, $idp, $kat, $hst, $hse, $jst, $jse, $sst, $sse);
        $data['karyawan']=[];
        foreach ($data['karyawan1'] as $p) {
            $getData=$this->Header_Jual->getOneData($p['id_hjual']);
            array_push($data['karyawan'], $getData[0]);
        }

        $this->load->view('penjualan/cari_penjualan.php',$data);
    }
}