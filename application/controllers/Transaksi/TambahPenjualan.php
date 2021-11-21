<?php
class tambahPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        $this->load->helper('url');
        $count = $this->Header_Jual->getAll();
        $str = (string) count($count)+1;
        $ids=$this->input->post('kons');
        $tglp=$this->input->post('tgl');
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
        $query2=$this->db->query("select sum(subtotal) from djual where id_hjual='".$id1."'");
        $result = $query2->result_array();
        $tambah = $this->Header_Jual->save($id1,$tglp,(int)$result[0]["sum(subtotal)"],$ids,"belum terbayar");
        ?>
        <!-- <script>
            alert("tambah pegawai berhasil");
        </script> -->
        <?php
        $_SESSION['success']="berhasil tambah penjualan";
        $this->session->mark_as_flash('success');
        $data['karyawan'] = $this->Header_Jual->getAll();
        $this->load->view('penjualan/cari_penjualan.php',$data);
    }
}