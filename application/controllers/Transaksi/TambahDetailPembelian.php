<?php
class tambahDetailPembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Detail_Beli");
        $this->load->model("Header_Beli");
    }

    public function index()
    {
        
        $this->load->helper('url');
        // $this->load->view('pembelian/.php');
        // $this->load->helper('url');
        $count = $this->Detail_Beli->getAll();
        $str = (string) count($count)+1;
        $count1 = $this->Header_Beli->getAll();
        $str1 = (string) count($count1)+1;
        $ktr=$this->input->post('keterangan');
        $jml=$this->input->post('jumlah');
        $hrg=$this->input->post('harga');
        $query2=$this->db->query("select max(substring(id_dbeli, 6)) from dbeli");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_dbeli, 6))"];
        $lastId+=1;
        $id = "";
        if($lastId < 10)
            $id .= "DBL00000";
        else if ($lastId >= 10 && $lastId < 100)
            $id .= "DBL0000";
        else if ($lastId >= 100 && $lastId < 1000)
            $id .= "DBL000";
        else if ($lastId >= 1000 && $lastId < 10000)
            $id .= "DBL00";
        else if ($lastId >= 10000 && $lastId < 100000)
            $id .= "DBL0";
        else
            $id .= "DBL";
        $id.=($lastId);
        $query3=$this->db->query("select max(substring(id_hbeli, 6)) from hbeli");
        $result1 = $query3->result_array();
        $lastId1=(int)$result1[0]["max(substring(id_hbeli, 6))"];
        $lastId1+=1;
        $id1 = "";
        if($lastId1 < 10)
            $id1 .= "HBL00000";
        else if ($lastId1 >= 10 && $lastId1 < 100)
            $id1 .= "HBL0000";
        else if ($lastId1 >= 100 && $lastId1 < 1000)
            $id1 .= "HBL000";
        else if ($lastId1 >= 1000 && $lastId1 < 10000)
            $id1 .= "HBL00";
        else if ($lastId1 >= 10000 && $lastId1 < 100000)
            $id1 .= "HBL0";
        else
            $id1 .= "HBL";

        $id1.=($lastId1);
        $tambah = $this->Detail_Beli->save($id,$id1,(int)$jml,(int)$jml*(int)$hrg,$ktr);

        $data['idSup']=$this->input->post('idSup');
        $data['tglBeli']=$this->input->post('tglBeli');

        $data['karyawan'] = $this->Detail_Beli->getByHeader($id1);
        $this->load->view('pembelian/tambah_pembelian.php',$data);
    }
}