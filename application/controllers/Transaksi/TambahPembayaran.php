<?php
class TambahPembayaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Pembayaran_Pembelian");
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        $this->load->helper('url');
        $idh=$this->input->post('idh');
        $nomh=$this->input->post('nomh');
        $tgl=$this->input->post('tgl');
        $jml=$this->input->post('jumlah');
        $note=$this->input->post('note');
        $met=$this->input->post('metode');
        $count = $this->Pembayaran_Pembelian->getAll();
        $str = (string) count($count)+1;
        $query2=$this->db->query("select max(substring(id_beli, 6)) from pbeli");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_beli, 6))"];
        $lastId+=1;
        $id = "";
        if($lastId < 10)
            $id .= "PBL00000";
        else if ($lastId >= 10 && $lastId < 100)
            $id .= "PBL0000";
        else if ($lastId >= 100 && $lastId < 1000)
            $id .= "PBL000";
        else if ($lastId >= 1000 && $lastId < 10000)
            $id .= "PBL00";
        else if ($lastId >= 10000 && $lastId < 100000)
            $id .= "PBL0";
        else
            $id .= "PBL";
        $id.=($lastId);
        $query2=$this->db->query("select sum(nominal_bayar) from pbeli where id_hbeli='".$idh."'");
        $result = $query2->result_array();
        echo (int)$result[0]["sum(nominal_bayar)"]+(int)$jml;
        if((int)$result[0]["sum(nominal_bayar)"]+(int)$jml < (int)$nomh)
        {
            $tambah = $this->Pembayaran_Pembelian->save($id,$idh,$tgl,$note,$met,$jml);
            $_SESSION['success']="berhasil tambah pembayaran pembelian";
            $this->session->mark_as_flash('success');
        }
        else if((int)$result[0]["sum(nominal_bayar)"]+(int)$jml == (int)$nomh)
        {
            $tambah = $this->Pembayaran_Pembelian->save($id,$idh,$tgl,$note,$met,$jml);
            $_SESSION['lunas'] = "pembayaran pembelian lunas";
            $this->session->mark_as_flash('lunas');
            $update = $this->Header_Beli->updatestatus($idh,"sudah terbayar");
        }
        else if((int)$result[0]["sum(nominal_bayar)"]+(int)$jml > (int)$nomh)
        {
            $_SESSION['lunas'] = "pembayaran pembelian sudah lunas sejak sebelumnya";
            $this->session->mark_as_flash('lunas');
        }
        $data['karyawan'] = $this->Header_Beli->getOneData($idh);
        $data['karyawan1'] = $this->Detail_Beli->getByHeader($idh);
        $this->load->view('pembelian/pembayaran_pembelian.php',$data);
    }
}