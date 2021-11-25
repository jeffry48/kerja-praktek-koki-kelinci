<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>laporan_pembelian_terbanyak</title>

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
        .box-header:hover{
            background-color: lightcyan;
            cursor: pointer;
        }
        .box:hover:hover{
            background-color: lightcyan;
            cursor: pointer;
        }
        .box-header{
            text-align: center;
            background-color: lightblue;
            color: black;
            height: 100%;
        }
        .box{
            text-align: center;
            background-color: lightblue;
            color: black;
            height: 100%;
        }
        .row{
            margin-top: 1%;
        }
        @media (max-width: 800px) {
            .box{
                margin-top: 3%;
            }
            .btn{
                margin-top: 2%;
                /* margin-left: 1%; */
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
            td:nth-of-type(1):before { content: "Id transaksi"; }
            td:nth-of-type(2):before { content: "nama pesanan"; }
            td:nth-of-type(3):before { content: "nama customer"; }
            td:nth-of-type(4):before { content: "kategori"; }
            td:nth-of-type(5):before { content: "harga satuan"; }
            td:nth-of-type(6):before { content: "jumlah bahan"; }
            td:nth-of-type(7):before { content: "subtotal"; }
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
                                <h1>Laporan penjualan terbanyak</h1>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <?php include 'application/views/nav_header_laporan.php'?>
                        </div>
                        <div class="col-sm-12">
                            <form action="<?=base_url()?>laporan/buatLaporanPenjualanterbanyak" method="POST">
                                    <div class="form-group">
                                        <label for="nama">tanggal start:</label>
                                        <input type="date" name = "tgs" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">tanggal end:</label> 
                                        <input type="date" name="tge" id=""class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="submit" value="buat laporan"  class="btn btn-info pull-left">
                                </div>    
                            </form>
                            <div style="margin-left: 2%;">
                                <div class="row" >
                                    <h4>id produk: <span>PRO0001</span></h4>
                                </div>
                                <div class="row" >
                                    <h4>nama produk: <span>aaaaaaaaaa</span></h4>
                                </div>
                                <div class="row">
                                    <h4>total: <span>0000000000</span></h4>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>id transaksi</th>
                                            <th>nama pesanan</th>
                                            <th>harga satuan</th>
                                            <th>jumlah barang</th>
                                            <th>subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($karyawan1 as $d): ?>
                                            <tr>
                                                <td><?php echo $d['id_djual']; ?></td>
                                                <td><?php echo $d['nama_penjualan']; ?></th>                                                                         
                                                <td><?php echo (int)$d['subtotal']/(int)$d['jumlah_jual']; ?></td>
                                                <td><?php echo $d['jumlah_jual']; ?></td>
                                                <td><?php echo $d['subtotal']; ?></td>
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
