<?php
class SelectDetailPembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model("Header_Beli");
        $this->load->model("Detail_Beli");
    }

    public function index()
    {
        $this->load->helper('url');
        $idd=$this->input->post('idd');
        $idh=$this->input->post('idh');
        $ktr=$this->input->post('keterangan');
        $jml=$this->input->post('jumlah');
        $hrg=$this->input->post('harga');
        $update = $this->Header_Beli->update($idd,$idh,$jml,(int)$jml*(int)$hrg,$ktr);
        ?>
        <!-- <script>
            alert("tambah pegawai berhasil");
        </script> -->
        <?php
        $_SESSION['success']="berhasil update detail pembelian";
        $this->session->mark_as_flash('success');
        $data['karyawan'] = $this->Header_Beli->getOneData($idh);
        $data['karyawan1'] = $this->Detail_Beli->getByHeader($idh);
        $data['ktr'] = $ktr;
        $data['jml'] = $jml;
        $data['hrg'] = $hrg;
        $this->load->view('pembelian/update_pembelian.php',$data);
        // redirect('pembeliancari_pembelian');
    }
}