<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tambah Penjualan</title>

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
                                <h1>Tambah Penjualan Baru</h1>
                                <br>
                                <button type="submit" class="btn btn-primary"> <a href="<?= base_url() ?>transaksi/Penjualan" style="color:white;">Kembali</a></button>
                            <div>
                </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Tambah Penjualan Baru</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= base_url() ?>transaksi/TambahPenjualan" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <h4>id header: <span>HBL0001</span></h4>
                                                <br>
                                                <label for="nama">Id Konsumen</label>
                                                <input type="text" name="id" class="form-control" id="nama" placeholder="Id Konsumen">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Tanggal Pembayaran</label>
                                                <input type="date" name="tgl" class="form-control" id="nama" placeholder="Tanggal Transaksi">
                                                <br>
                                                <h4>total: <span>10000000</span></h4>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Tambah Penjualan</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Tambah Detail Penjualan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= base_url() ?>transaksi/TambahDetailPenjualan" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <h4>id detail: <span>DBL0006</span></h4>
                                                <br>
                                                nama pesanan: 
                                                <select name = "barang" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="nama pesanan">
                                                    <option value="">produk 1</option>
                                                    <option value="">produk 2</option>
                                                    <option value="">produk 3</option>
                                                    <option value="">produk 4</option>
                                                    <option value="">produk 5</option>
                                                    <option value="">produk 6</option>
                                                </select>
                                                <br>
                                                <h4>harga satuan: <span>2000</span></h4>
                                                <br>
                                                <input type="text" name = "jumlah" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah">
                                                <br>
                                                <h4>subtotal: <span>8000</span></h4>
                                                <br>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button class="btn btn-primary"><a style="color: white" href="<?= base_url() ?>transaksi/TambahDetailPenjualan">Tambah Detail Penjualan</a></button>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <table>
                                            <tr>
                                                <th>id transaksi</th>
                                                <th>id header</th>
                                                <th>nama penjualan</th>
                                                <th>harga satuan</th>
                                                <th>jumlah</th>
                                                <th>sub total</th>
                                            </tr>
                                            <tr>
                                                <th>DJL0001</th>
                                                <th>HJL0001</th>
                                                <th>produk 123456</th>
                                                <th>20000</th>
                                                <th>4</th>
                                                <th>80000</th>
                                            </tr>
                                            <tr>
                                                <th>DJL0002</th>
                                                <th>HJL0001</th>
                                                <th>produk 2</th>
                                                <th>300</th>
                                                <th>3</th>
                                                <th>900</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card -->
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
            });
        </script>
    </body>
</html>
