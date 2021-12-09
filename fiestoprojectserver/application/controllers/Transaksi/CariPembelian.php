<?php
class cariPembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        // $this->load->helper('url');
        $idh=$this->input->post('idh');
        $ids=$this->input->post('ids');
        $tgls=$this->input->post('tgls');
        $tgle=$this->input->post('tgle');
        $tots=$this->input->post('tots');
        $tote=$this->input->post('tote');
        $stat=$this->input->post('status');

        $idd=$this->input->post('idd');
        $nama=$this->input->post('nama');
        $hst=$this->input->post('hst');
        $hse=$this->input->post('hse');
        $jst=$this->input->post('jst');
        $jse=$this->input->post('jse');
        $sst=$this->input->post('sst');
        $sse=$this->input->post('sse');
        $resultHead=$this->Header_Beli->search($idh,$ids,$tgls,$tgle,$tots,$tote,$stat, 
                                                    $idd, $nama, $hst, $hse, $jst, $jse, $sst, $sse);
        $data['karyawan']=[];
        foreach ($resultHead as $p) {
            $getData=$this->Header_Beli->getOneData($p['id_hbeli']);
            array_push($data['karyawan'], $getData[0]);
        }
        // var_dump($data['karyawan'][0]);
        // var_dump($resultHead);
        
        // $this->load->view('pembelian/cari_pembelian.php',$data);
        $_SESSION['data']=$data;
        return redirect(base_url()."transaksi/cariPembelian");
    }
}