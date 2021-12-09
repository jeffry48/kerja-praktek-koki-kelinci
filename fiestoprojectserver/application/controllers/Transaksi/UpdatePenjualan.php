<?php
class Updatepenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Jual");
        $this->load->model("Detail_Jual");
    }

    public function index()
    {
        $this->load->helper('url');
        $idh=$this->input->post('idh');
        $ids=$this->input->post('ids');
        $tglp=$this->input->post('tglp');
        $update = $this->Header_Jual->updatesuppliertglp($idh,$ids,$tglp);
        // $update1 = $this->Detail_Beli->updateheader($idh,$ids,$tglp);
        // $data['karyawan'] = $this->Header_Jual->getOneData($idh);
        // $data['karyawan1'] = $this->Detail_Jual->getByHeader($idh);
        // $this->load->view('penjualan/cari_penjualan.php',$data);

        $query2=$this->db->query("select sum(subtotal) from djual where id_hjual='".$idh."'");
        $result = $query2->result_array();
        $total=(int)$result[0]["sum(subtotal)"];
        $this->Header_Jual->updateTotal($idh,$total);
        
        return redirect($this->config->item('backend_server_url')."transaksi/penjualan");
    }
}