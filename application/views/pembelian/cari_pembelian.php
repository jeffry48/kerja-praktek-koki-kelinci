<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>cari pembelian</title>

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
        @media (max-width: 800px) {
            .row{
                margin-left: 1%;
                margin-right: 1%;
            }
            .col-sm-6{
                width: 50%;
                float: left;
            }
            .btn{
                margin-top: 2%;
                margin-left: 1%;
            }
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
                                <h1>Daftar Pembelian</h1>
                                <br>
                                <button type="submit" class="btn btn-primary"> <a href="<?= base_url() ?>transaksi/keTambahPembelian">Tambah Pembelian</a></button>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Pencarian Header</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= base_url()?>transaksi/cariPembelian" method="POST">
                                        <input type="text" name = "idh" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Id Header">
                                        <br>
                                        <input type="text" name = "ids" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Id Supplier">                        
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
                                        <div class="row" style="margin-left: 0%;">
                                            <input type="submit" class="btn btn-info pull-left" value = "Cari">
                                            <button class="btn btn-info pull-left" style="margin-left: 1%;">clear</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-sm-6">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Pencarian Detail</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= base_url()?>transaksi/cariDetailPembelian" method="POST">
                                        <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Id detail">
                                        <br>
                                        <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="id header">                        
                                        <br>
                                        <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="nama pembelian">
                                        <br>
                                        <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="harga satuan start">                                
                                        <br>
                                        <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="harga satuan end">                        
                                        <br>
                                        <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah start">
                                        <br>    
                                        <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah end">
                                        <br>
                                        <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="subtotal start">                        
                                        <br>
                                        <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="subtotal end">
                                        <br> 
                                        <div class="row" style="margin-left: 0%;">
                                        <input type="submit" class="btn btn-info pull-left" value = "Cari">
                                            <button class="btn btn-info pull-left" style="margin-left: 1%;">clear</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-info pull-left" style="background-color: red;">
                                <a style="color: white;" data-toggle="modal" data-target="#modalTutup">
                                    Hapus Semua Data Pembelian
                                </a>
                            </button>
                            <!-- modal -->
                            <div class="modal fade" id="modalTutup" tabindex="-1" role="dialog" aria-labelledby="modalTutupLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header" style="background-color: red;">
                                    <h5 class="modal-title" id="modalTutup"><b>HAPUS SEMUA DATA PEMBELIAN</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus semua data pembelian?
                                </div>
                                <div class="modal-footer">
                                    <form action="<?= base_url()?> transaksi/hapusSemuaPembelian" method="POST">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                        <input type="submit" value="Hapus" class="btn btn-primary" style="background-color: red;">
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <h3>Header pembelian</h3>
                            <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>id transaksi</th>
                                    <th>tanggal</th>
                                    <th>nama supplier</th>
                                    <th>total</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                                <tr>
                                    <th>HBL0001</th>
                                    <th>19/9/2021</th>
                                    <th>supplier 1</th>
                                    <th>2800</th>
                                    <th>sudah terbayar</th>
                                    <th>
                                        <center>
                                            <button class="btn btn-info pull-left"><a style="color: white" href="<?= base_url() ?>transaksi/keUpdatePembelian">update</a></button>
                                            <!-- <button class="btn btn-info pull-left" style="margin-left: 1%;"><a style="color: white"href="#">hapus</a></button> -->
                                            <button type="button" class="btn btn-info pull-left" style="margin-left: 1%;" data-toggle="modal" data-target="#modalHapus">
                                                hapus
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalHapusLabel">Hapus Pembelian</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th>id transaksi</th>
                                                            <th>id header</th>
                                                            <th>nama pembelian</th>
                                                            <th>harga satuan</th>
                                                            <th>jumlah</th>
                                                            <th>sub total</th>
                                                        </tr>
                                                        <tr>
                                                            <th>DBL0001</th>
                                                            <th>HBL0001</th>
                                                            <th>bahan 123456</th>
                                                            <th>20000</th>
                                                            <th>4</th>
                                                            <th>80000</th>
                                                        </tr>
                                                        <tr>
                                                            <th>DBL0002</th>
                                                            <th>HBL0001</th>
                                                            <th>bahan 2</th>
                                                            <th>300</th>
                                                            <th>3</th>
                                                            <th>900</th>
                                                        </tr>
                                                    </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="<?=base_url()?>transaksi/hapusPembelian" method="POST">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">batal</button>
                                                        <input type="submit" value="Hapus" class="btn btn-primary" style="background-color: red;" >
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                            <button class="btn btn-info pull-left" style="margin-left: 1%;"><a style="color: white" href="<?= base_url()?>transaksi/kePembayaranPembelian">bayar</a></button>
                                            <button type="button" class="btn btn-info pull-left" style="margin-left: 1%;" data-toggle="modal" data-target="#modalDetail">
                                                detail
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalDetailLabel">Detail pembelian</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th>id transaksi</th>
                                                            <th>id header</th>
                                                            <th>nama pembelian</th>
                                                            <th>harga satuan</th>
                                                            <th>jumlah</th>
                                                            <th>sub total</th>
                                                        </tr>
                                                        <tr>
                                                            <th>DBL0001</th>
                                                            <th>HBL0001</th>
                                                            <th>bahan 123456</th>
                                                            <th>20000</th>
                                                            <th>4</th>
                                                            <th>80000</th>
                                                        </tr>
                                                        <tr>
                                                            <th>DBL0002</th>
                                                            <th>HBL0001</th>
                                                            <th>bahan 2</th>
                                                            <th>300</th>
                                                            <th>3</th>
                                                            <th>900</th>
                                                        </tr>
                                                    </table>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </center>
                                    </th>
                                </tr>
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
