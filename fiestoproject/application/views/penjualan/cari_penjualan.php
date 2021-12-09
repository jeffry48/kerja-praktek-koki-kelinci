<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>cari penjualan</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          overflow: auto;
        }
        th
        {
            background-color: white;
        }
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        a{
            color: white;
        }
        .card{
            padding: 3%;
        }            
        .harga{
            text-align: right;
        }
        @media (max-width: 800px) {
            /* .row{
                margin-left: 1%;
                margin-right: 1%;
            } */

            .harga{
                text-align: left;
            }


            .col-sm-6{
                width: 50%;
                float: left;
            }
            .btn{
                margin-top: 2%;
                /* margin-left: 1%; */
            }
            #tambahBtn{
                width: 100%;
            }

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr { 
                display: block; 
            }
            
            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr { 
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            
            tr { border: 1px solid #ccc; }
            
            td { 
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee; 
                position: relative;
            }
            
            td:before { 
                /* Now like a table header */
                /* position: absolute; */
                /* Top/left values mimic padding */
                
                width: 45%; 
                padding-right: 10px; 
                white-space: nowrap;
            }
            
            /*
            Label the data
            */
            #tabelTrans td:nth-of-type(1):before { content: "id transaksi"; }
            #tabelTrans td:nth-of-type(2):before { content: "tanggal"; }
            #tabelTrans td:nth-of-type(3):before { content: "total"; }
            #tabelTrans td:nth-of-type(4):before { content: "id konsumen"; }
            #tabelTrans td:nth-of-type(5):before { content: "status"; }
            #tabelTrans td:nth-of-type(6):before { content: "action"; }

            #tabelDetail td:nth-of-type(1):before { content: "id transaksi"; }
            #tabelDetail td:nth-of-type(2):before { content: "nama produk"; }
            #tabelDetail td:nth-of-type(3):before { content: "jumlah penjualan"; }
            #tabelDetail td:nth-of-type(4):before { content: "harga satuan"; }
            #tabelDetail td:nth-of-type(5):before { content: "subtotal"; }
            
        }
    </style>
    </head>
    <body class="hold-transition sidebar-mini sidebar-collapse">
        <?php include 'application/views/header.php'; ?>
        <?php include 'application/views/sidebar.php';?>
        <div class="wrapper">
            <!-- Navbar -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Daftar Penjualan</h1>
                                <br>
                                <button type="submit" id="tambahBtn" class="btn btn-primary"> <a href="<?= base_url() ?>transaksi/keTambahpenjualan">Tambah Penjualan</a></button>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Search
                        </button>
                        <div class="collapse" id="collapseExample">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card card-primary">
                                        <div class="card-header" style="margin-left: -3%; margin-top: -3%; margin-right: -3%;">
                                            <h3 class="card-title">Pencarian</h3>
                                        </div>
                                        <br>
                                        <form action="<?= base_url()?>transaksi/cariPenjualan" method="POST">
                                            <div class="col-sm-6" style="float: left;">
                                                <input type="text" name = "idh" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Id Transaksi">
                                                <br>
                                                <input type="text" name = "idk" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Id Konsumen">                        
                                                <br>
                                                tanggal start: 
                                                <input type="date" name = "tgls" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="tanggal start">
                                                <br>
                                                tanggal end: 
                                                <input type="date" name = "tgle" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="tanggal end">                                
                                                <br>
                                                <input type="text" name = "tots" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="total start">                        
                                                <br>
                                                <input type="text" name = "tote" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="total end">
                                                <br>                                
                                                
                                                <select name = "status" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;">
                                                    <option value="sudah terbayar" style="color: green;">sudah terbayar</option>
                                                    <option value="belum terbayar" style="color: red;">belum terbayar</option>
                                                </select>
                                                <br>
                                            </div>
                                            <div class="col-sm-6" style="float: left;">
                                                <input type="text" name = "idd" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Id ">
                                                <br>
                                                nama produk: 
                                                <select name = "idp" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;">
                                                    <option  value=""> All</option>
                                                <?php 
                                                    $sql3 ="SELECT * FROM produk";
                                                    $query3 = $this->db->query($sql3); 
                                                    $kategoriArr = $query3->result_array(); 
                                                    foreach($kategoriArr as $d3): 
                                                    ?>
                                                    <option value="<?php echo $d3['id_produk']; ?>"><?php echo $d3["nama_produk"] ?></option>
                                                <?php endforeach; ?>      
                                                </select>                                          
                                                <br>
                                                kategori: 
                                                <select name = "kat" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;">
                                                    <option value=""> All</option>
                                                    <?php 
                                                    $sql3 ="SELECT * FROM kategori";
                                                    $query3 = $this->db->query($sql3); 
                                                    $kategoriArr = $query3->result_array(); 
                                                    foreach($kategoriArr as $d3): 
                                                    ?>
                                                    <option value="<?php echo $d3['id_kategori']; ?>"><?php echo $d3["nama_kategori"] ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                                <br>
                                                <input type="text" name = "hst" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="harga satuan start">                                
                                                <br>
                                                <input type="text" name = "hse" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="harga satuan end">                        
                                                <br>
                                                <input type="text" name = "jst" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah start">
                                                <br>    
                                                <input type="text" name = "jse" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah end">
                                                <br>
                                                <input type="text" name = "sst" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="subtotal start">                        
                                                <br>
                                                <input type="text" name = "sse" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="subtotal end">
                                            </div>
                                            <div class="card-footer">
                                                <input type="submit" class="btn btn-info pull-left" value = "Cari">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h3>Transaksi penjualan</h3>
                            <div class="table-responsive">
                            <table id="tabelTrans">
                                <thead>
                                    <tr>
                                        <th>id transaksi</th>
                                        <th>tanggal</th>
                                        <th>total</th>
                                        <th>id konsumen</th>
                                        <th>status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($karyawan as $d): ?>
                                    <tr>
                                        <td><?php echo $d['id_hjual']; ?></td>
                                        <td><?php echo $d['tanggal_jual']; ?></td>
                                        <td class="harga">Rp <?php echo number_format($d['total_jual'], 0, ".", "."); ?></td>
                                        <td><?php echo $d['id_konsumen']; ?></td>
                                        <td><?php echo $d['status_jual']; ?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group" role="group">
                                                    <div class="col-sm-3 custom">
                                                        <!-- update -->
                                                        <form action="<?=base_url()?>transaksi/KeUpdatePenjualan" method="POST">
                                                            <input type="hidden" name="idh" value="<?php echo $d['id_hjual']; ?>">
                                                            <button class="btn btn-info pull-left">update</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-3 custom">
                                                        <!-- hapus -->
                                                        <form action="<?= base_url() ?>transaksi/HapusPenjualan" method="POST">
                                                            <input type="hidden" name="idh" value="<?php echo $d['id_hjual']; ?>">
                                                            <button class="btn btn-info pull-left" style="margin-left:1%;">hapus</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-3 custom">
                                                        <!-- bayar -->
                                                        <form action="<?= base_url()?>transaksi/kePembayaranPenjualan" method="POST">
                                                            <input type="hidden" name="idh" value="<?php echo $d['id_hjual']; ?>">
                                                            <button class="btn btn-info pull-left" style="margin-left: 1%;">bayar</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-3 custom">
                                                        <!-- detail -->
                                                        <button type="button" class="btn btn-info pull-left" style="margin-left: 1%;" data-toggle="modal" data-target="#modalDetail<?php echo $d['id_hjual']; ?>">
                                                            detail
                                                        </button>
                                                        <!-- Modal detail -->
                                                        <div class="modal fade" id="modalDetail<?php echo $d['id_hjual']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalDetailLabel">Detail penjualan</h5>
                                                                <span aria-hidden="true">&times;</span>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="table-responsive">
                                                                <table id="tabelDetail">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>id transaksi</th>
                                                                            <th>nama produk</th>
                                                                            <th>jumlah penjualan</th>
                                                                            <th>harga satuan</th>
                                                                            <th>subtotal</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                            $sql ="SELECT * FROM djual where id_hjual='".$d['id_hjual']."'";
                                                                            $query = $this->db->query($sql); 
                                                                            $karyawan1 = $query->result_array(); 
                                                                            foreach($karyawan1 as $d1):
                                                                                $sql2="SELECT * FROM produk WHERE id_produk='".$d1['id_produk']."'";
                                                                                $query2 = $this->db->query($sql2); 
                                                                                $p=$query2->result_array();
                                                                        ?>
                                                                        <tr>
                                                                                <td><?php echo $d1['id_djual']; ?></td>
                                                                                <td><?php echo $p[0]['nama_produk']; ?></td>
                                                                                <td><?php echo number_format($d1['jumlah_jual'], 0, ".", "."); ?></td>
                                                                                <td class="harga">Rp <?php echo number_format($d1['subtotal']/$d1['jumlah_jual'], 0, ".", "."); ?></td>
                                                                                <td class="harga">Rp <?php echo number_format($d1['subtotal'], 0, ".", "."); ?></td>
                                                                        </tr>
                                                                        <?php 
                                                                            endforeach; 
                                                                        ?>
                                                                    </tbody>
                                                                    
                                                                </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.2.0-rc
                </div>
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer> -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="<?= base_url() ?>assets/backend/css/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url() ?>assets/backend/css/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="<?= base_url() ?>assets/backend/css/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>assets/backend/css/adminlte/dist/js/adminlte.min.js"></script>
        <!-- Page specific script -->
        <script>
            $(function () {
                bsCustomFileInput.init();
                <?php
                if(isset($_SESSION['success'])){
                    echo '$("#myModal").modal("show");';
                }
                ?>
            });
        </script>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel"></h5>
            </div>
            <div class="modal-body">
                <?php 
                echo $_SESSION['success']; 
                $_SESSION['success']=null;
                ?>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    </body>
</html>