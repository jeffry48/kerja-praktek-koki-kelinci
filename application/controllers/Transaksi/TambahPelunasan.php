<?php
class TambahPelunasan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Pembayaran_Penjualan");
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
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
        $query2=$this->db->query("select max(substring(id_jual, 6)) from pjual");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_jual, 6))"];
        $lastId+=1;
        $id = "";
        if($lastId < 10)
            $id .= "PJL00000";
        else if ($lastId >= 10 && $lastId < 100)
            $id .= "PJL0000";
        else if ($lastId >= 100 && $lastId < 1000)
            $id .= "PJL000";
        else if ($lastId >= 1000 && $lastId < 10000)
            $id .= "PJL00";
        else if ($lastId >= 10000 && $lastId < 100000)
            $id .= "PJL0";
        else
            $id .= "PJL";
        $id.=($lastId);
        $query2=$this->db->query("select sum(nominal_bayar) from pjual where id_hjual='".$idh."'");
        $result = $query2->result_array();
        echo (int)$result[0]["sum(nominal_bayar)"]+(int)$jml;
        if((int)$result[0]["sum(nominal_bayar)"]+(int)$jml < (int)$nomh)
        {
            $tambah = $this->Pembayaran_Penjualan->save($id,$idh,$tgl,$note,$met,$jml);
            $_SESSION['success']="berhasil tambah pembayaran penjualan";
            $this->session->mark_as_flash('success');
        }
        else if((int)$result[0]["sum(nominal_bayar)"]+(int)$jml == (int)$nomh)
        {
            $tambah = $this->Pembayaran_Penjualan->save($id,$idh,$tgl,$note,$met,$jml);
            $_SESSION['lunas'] = "pembayaran penjualan lunas";
            $this->session->mark_as_flash('lunas');
            $update = $this->Header_Jual->updatestatus($idh,"sudah terbayar");
        }
        else if((int)$result[0]["sum(nominal_bayar)"]+(int)$jml > (int)$nomh)
        {
            $_SESSION['lunas'] = "pembayaran penjualan sudah lunas sejak sebelumnya";
            $this->session->mark_as_flash('lunas');
        }
        $data['karyawan'] = $this->Header_Jual->getOneData($idh);
        $data['karyawan1'] = $this->Detail_Jual->getByHeader($idh);
        $data['karyawan2'] = $this->Pembayaran_Penjualan->getByHeader($idh);
        $this->load->view('penjualan/pembayaran_penjualan.php',$data);
    }
}