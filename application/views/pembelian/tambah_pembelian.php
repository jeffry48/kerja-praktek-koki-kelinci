<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tambah Pembelian</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">

    <style>
        table{
            width: 100%;
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
                                <h1>Tambah Pembelian Baru</h1>
                                <br>
                                <button type="submit" class="btn btn-primary"> <a href="<?= base_url() ?>transaksi/Pembelian" style="color:white;">Kembali</a></button>
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
                                        <h3 class="card-title">Tambah Pembelian Baru</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= base_url() ?>transaksi/TambahPembelian" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <!-- <h4>id header: <span>HBL0001</span></h4> -->
                                                <br>
                                                <label for="nama">Id Supplier</label>
                                                <input type="text" name="ids" class="form-control" id="nama" placeholder="Id Supplier">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Tanggal Pembayaran</label>
                                                <input type="date" name="tglp" class="form-control" id="nama" placeholder="Tanggal Pembayaran">
                                                <!-- <h4>total: <span>10000000</span></h4> -->
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Tambah Pembelian</button>
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
                                        <h3 class="card-title">Tambah Detail Pembelian</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= base_url() ?>transaksi/TambahDetailPembelian" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <!-- <h4>id detail: <span>DBL0006</span></h4> -->
                                                <br>
                                                <label for="nama">Nama Pembelian</label> 
                                                <input type="text" name = "keterangan" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="nama pembelian">
                                                <br>
                                                <label for="nama">Harga Satuan</label> 
                                                <input type="text" name = "harga" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="harga satuan">
                                                <!-- <h4>harga satuan: <span>2000</span></h4> -->
                                                <br>
                                                <label for="nama">Jumlah</label>
                                                <input type="text" name = "jumlah" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah">
                                                <!-- <h4>subtotal: <span>8000</span></h4> -->
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button class="btn btn-primary">Tambah Detail Pembelian</button>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table>
                                            <tr>
                                                <th>id transaksi</th>
                                                <th>id header</th>
                                                <th>nama pembelian</th>
                                                <th>harga satuan</th>
                                                <th>jumlah</th>
                                                <th>sub total</th>
                                            </tr>
                                            <?php foreach($karyawan as $d): ?>
                                            <tr>
                                                <th><?php echo $d['id_dbeli']; ?></th>
                                                <th><?php echo $d['id_hbeli']; ?></th>
                                                <th><?php echo $d['nama_pembelian']; ?></th>
                                                <th><?php echo $d['subtotal']/$d['jumlah_beli']; ?></th>
                                                <th><?php echo $d['jumlah_beli']; ?></th>
                                                <th><?php echo $d['subtotal']; ?></th>
                                            </tr>
                                            <?php endforeach; ?>
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
