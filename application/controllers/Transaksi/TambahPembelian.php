<?php
class tambahPembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        $this->load->helper('url');
        $count = $this->Header_Beli->getAll();
        $str = (string) count($count)+1;
        $ids=$this->input->post('ids');
        $tglp=$this->input->post('tglp');
        $query2=$this->db->query("select max(substring(id_hbeli, 6)) from hbeli");
        $result = $query2->result_array();
        $lastId=(int)$result[0]["max(substring(id_hbeli, 6))"];
        $lastId+=1;
        $id = "";
        if($lastId < 10)
            $id .= "HBL00000";
        else if ($lastId >= 10 && $lastId < 100)
            $id .= "HBL0000";
        else if ($lastId >= 100 && $lastId < 1000)
            $id .= "HBL000";
        else if ($lastId >= 1000 && $lastId < 10000)
            $id .= "HBL00";
        else if ($lastId >= 10000 && $lastId < 100000)
            $id .= "HBL0";
        else
            $id .= "HBL";

        $id.=($lastId);
        $query2=$this->db->query("select sum(subtotal) from dbeli where id_hbeli='".$id."'");
        $result = $query2->result_array();
        $tambah = $this->Header_Beli->save($id,$ids,(int)$result[0]["sum(subtotal)"],$ids,"belum terbayar");
        ?>
        <!-- <script>
            alert("tambah pegawai berhasil");
        </script> -->
        <?php
        $_SESSION['success']="berhasil tambah header pembelian";
        $this->session->mark_as_flash('success');
        $data['karyawan'] = $this->Header_Beli->getAll();
        $this->load->view('pembelian/cari_pembelian.php',$data);
        // redirect('pembeliancari_pembelian');
    }
}