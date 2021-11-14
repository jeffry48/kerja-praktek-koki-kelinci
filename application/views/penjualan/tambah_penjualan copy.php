<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <style>
        .row{
            margin-left: 5%;
            margin-right: 5%;
            margin-top: 1%;
        }
        .box-header:hover{
            background-color: blue;
            color: white;
            cursor: pointer;
        }
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
    </style>
    </head>
    <body class="hold-transition sidebar-mini sidebar-collapse">
        <?php include 'application/views/header.php'; ?>
        <?php include 'application/views/sidebar.php';?>
        <div class="wrapper">
            <!-- Navbar -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="row">
                    <h3>Tambah Penjualan Baru</h3>
                </div>
                <div class="row">
                    <button class="btn btn-info pull-left"><a style="color: white" href="<?= base_url() ?>transaksi/penjualan">kembali</a></button>
                </div>
                <div class="row">
                    Nama Konsumen
                    <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="nama konsumen">
                </div>
                <div class="row">
                    tanggal penjualan: 
                    <input type="date" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="nama supplier">
                </div>
                <div class="row">
                    <h4>total: <span>10000000</span></h4>
                </div>
                <div class="row">
                    <h3>Detail</h3>
                </div>
                <div class="row">
                    nama pesanan: 
                    <select name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" >
                        <option value="">makanan 1</option>
                        <option value="">makanan 2</option>
                        <option value="">makanan 3</option>
                        <option value="">minuman 1</option>
                        <option value="">minuman 2</option>
                        <option value="">minuman 3</option>
                    </select>
                </div>
                <div class="row">
                    <h4>kategori: <span>makanan</span></h4>
                </div>
                <div class="row">
                    <h4>harga satuan: <span>2000</span></h4>
                </div>
                <div class="row">
                    Jumlah
                    <input name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah";>
                </div>
                <div class="row">
                    <h4>subtotal: <span>8000</span></h4>
                </div>
                <div class="row">
                    <button class="btn btn-info pull-left"><a style="color: white" href="<?= base_url() ?>transaksi/tambahDetailpenjualan">Tambah Detail penjualan</a></button>
                </div>
                <div class="row">
                    <button class="btn btn-info pull-left"><a style="color: white" href="<?= base_url() ?>transaksi/tambahpenjualan">Tambah penjualan</a></button>
                </div>
                <div class="row">
                    <table>
                        <tr>
                            <th>id transaksi</th>
                            <th>nama pesanan</th>
                            <th>kategori</th>
                            <th>harga satuan</th>
                            <th>jumlah</th>
                            <th>subtotal</th>
                        </tr>
                        <tr>
                            <th>DJL0001</th>
                            <th>makanan 1</th>
                            <th>makanan</th>
                            <th>2000</th>
                            <th>4</th>
                            <th>8000</th>
                        </tr>
                        <tr>
                            <th>DJL0002</th>
                            <th>makanan 2</th>
                            <th>makanan</th>
                            <th>3000</th>
                            <th>4</th>
                            <th>12000</th>
                        </tr>
                    </table>
                </div>
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
