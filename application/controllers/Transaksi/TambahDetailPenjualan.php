<?php
class tambahDetailPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Detail_Jual");
        $this->load->model("Header_Jual");
        $this->load->model("Customer");
        $this->load->model("Produk_model");
    }

    public function index()
    {
        
        $this->load->helper('url');
        $idp=$this->input->post('produk');
        $jml=$this->input->post('jumlah');
        // $hrg=$this->input->post('harga');
        $query2=$this->db->query("select max(substring(id_djual, 6)) from djual");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_djual, 6))"];
        $lastId+=1;
        $id = "";
        if($lastId < 10)
            $id .= "DJL00000";
        else if ($lastId >= 10 && $lastId < 100)
            $id .= "DJL0000";
        else if ($lastId >= 100 && $lastId < 1000)
            $id .= "DJL000";
        else if ($lastId >= 1000 && $lastId < 10000)
            $id .= "DJL00";
        else if ($lastId >= 10000 && $lastId < 100000)
            $id .= "DJL0";
        else
            $id .= "DJL";
        $id.=($lastId);
        $query3=$this->db->query("select max(substring(id_hjual, 6)) from hjual");
        $result1 = $query3->result_array();
        $lastId1=(int)$result1[0]["max(substring(id_hjual, 6))"];
        $lastId1+=1;
        $id1 = "";
        if($lastId1 < 10)
            $id1 .= "HJL00000";
        else if ($lastId1 >= 10 && $lastId1 < 100)
            $id1 .= "HJL0000";
        else if ($lastId1 >= 100 && $lastId1 < 1000)
            $id1 .= "HJL000";
        else if ($lastId1 >= 1000 && $lastId1 < 10000)
            $id1 .= "HJL00";
        else if ($lastId1 >= 10000 && $lastId1 < 100000)
            $id1 .= "HJL0";
        else
            $id1 .= "HJL";
        $id1.=($lastId1);
        $hargaPro=$this->Produk_model->getByIdPro($idp);
        $tambah = $this->Detail_Jual->save($id,(int)$jml,(int)$jml*(int)$hargaPro['harga_produk'],$idp,$id1);
        // $_SESSION['success']="berhasil tambah detail penjualan";
        // $this->session->mark_as_flash('success');
        $data['karyawan'] = $this->Detail_Jual->getByHeader($id1);
        $data['karyawan1'] = $this->Customer->getAll();
        $data['karyawan2'] = $this->Produk_model->getAllProduk();

        $data['idKon']=$this->input->post('idKon');
        $data['tglJual']=$this->input->post('tglJual');

        $this->load->view('penjualan/tambah_penjualan.php',$data);
    }
}