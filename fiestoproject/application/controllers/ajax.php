<?php
    
    class ajax extends CI_Controller {


        public function __construct() {
            parent::__construct();
            $this->load->library('session');
        }
        function ubahHargaTambahPenjualan()
        {
            $idPro=$_POST['idPro'];
            $query2=$this->db->query("select * from produk where id_produk='".$idPro."'");
            $result = $query2->result_array();
            $resultString=json_encode($result);
            echo $resultString;
        }
    }
?>