<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>home_laporan</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/dist/css/skins/_all-skins.min.css">

</head>
<style>
    .box-header:hover{
        background-color: blue;
        color: white;
        cursor: pointer;
    }
</style>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <?php include 'application/views/header.php' ?>
        </header>
        <aside class="main-sidebar">
            <?php include 'application/views/sidebar.php';?>
        </aside>

        <div class="content-wrapper">
                <div class="row">
                    <center>
                        <h3>HOME LAPORAN</h3>
                    </center>
                </div>

                <!-- <div class="row">
                    <center>
                        <div class="row">
                            <div class="flexBox" style="
                              display: flex;
                              flex-flow: row wrap;
                              justify-content: center;">
                                <div class="col-md-3">
                                    <div class="box">
                                        <a href="<?= base_url() ?>assets/backend/css/laporan pembelian/laporan_per_supplier.php">
                                            <div class="box-header">Laporan per Supplier</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box">
                                        <a href="<?= base_url() ?>assets/backend/css/laporan penjualan/laporan_per_customer.php">
                                            <div class="box-header">Laporan per Customer</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box">
                                        <a href="<?= base_url() ?>assets/backend/css/laporan pembelian/laporan_pembelian_terbanyak.php">
                                            <div class="box-header">Laporan Pembelian Terbanyak</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box">
                                        <a href="<?= base_url() ?>assets/backend/css/laporan penjualan/laporan_penjualan_terbanyak.php">
                                            <div class="box-header">Laporan Penjualan Terbanyak</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </center>
                </div>
                <div class="row">
                    <center>
                        <div class="row">
                            <div class="flexBox" style="
                              display: flex;
                              flex-flow: row wrap;
                              justify-content: center;">
                                <div class="col-md-3">
                                    <div class="box">
                                        <a href="<?= base_url() ?>assets/backend/css/laporan penjualan/laporan_mutasi_penjualan.php">
                                            <div class="box-header">Laporan Mutasi Penjualan</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box">
                                        <a href="<?= base_url() ?>assets/backend/css/laporan pembelian/laporan_mutasi_pembelian.php">
                                            <div class="box-header">Laporan Mutasi Pembelian</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                          </div>

                    </center>
                </div> -->
        </div>
        <footer class="main-footer">

        </footer>
        <div class="control-sidebar-bg"></div>
    </div>

    <script src="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?= base_url() ?>assets/backend/css/public/adminlte/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/css/public/adminlte/dist/js/demo.js"></script>

    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree()
        })

        $(function () {
            $('#edTanggal').datepicker();
        });
    </script>
</body>
</html>
