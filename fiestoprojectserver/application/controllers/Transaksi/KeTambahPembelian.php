<?php
class keTambahpembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        
        $this->load->helper('url');
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
        $data['karyawan'] = $this->Detail_Beli->getByHeader($id1);
        // $this->load->view('pembelian/tambah_pembelian.php',$data);
        $_SESSION['data']=$data;
        return redirect(base_url()."transaksi/keTambahPembelian");
    }
}