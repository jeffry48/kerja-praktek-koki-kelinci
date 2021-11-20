<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pembayaran penjualan Sudah</title>

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
                                <h1>Pembayaran penjualan Sudah</h1>
                                <br>
                                <button type="submit" class="btn btn-primary"> <a href="<?= base_url() ?>transaksi/KePembayaranpenjualan" style="color:white;">Kembali</a></button>
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
                                        <h3 class="card-title">Pembayaran penjualan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= base_url() ?>transaksi/KeNotapenjualan" method="post">
                                        <div class="card-body">
                                            <?php foreach($karyawan as $d): ?>
                                                <div class="form-group">
                                                    <h4>id Penjualan: <span><?php echo $d['id_hjual']; ?></span></h4><br>
                                                    <h4>tanggal: <span><?php echo $d['tanggal_jual']; ?></span></h4><br>
                                                    <h4>id konsumen: <span><?php echo $d['id_konsumen']; ?></span></h4><br>
                                                    <h4>status: <span style="color: green;"><?php echo $d['status_jual']; ?></span></h4><br>
                                                    <h4>total: <span><?php echo $d['total_jual']; ?></span></h4><br>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <div class="row">
                            <h4>Detail Penjualan</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>id transaksi</th>
                                        <th>id header</th>
                                        <th>harga satuan</th>
                                        <th>jumlah</th>
                                        <th>sub total</th>
                                    </tr>
                                    <?php foreach($karyawan1 as $d): ?>
                                        <tr>
                                            <th><?php echo $d['id_djual']; ?></th>
                                            <th><?php echo $d['id_hjual']; ?></th>
                                            <th><?php echo $d['subtotal']/$d['jumlah_jual']; ?></th>
                                            <th><?php echo $d['jumlah_jual']; ?></th>
                                            <th><?php echo $d['subtotal']; ?></th>
                                        </tr>
                                    <?php endforeach; ?>
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
            });
        </script>
    </body>
</html>
