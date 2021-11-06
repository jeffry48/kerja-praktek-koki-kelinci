<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>laporan_mutasi_penjualan</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/dist/css/skins/_all-skins.min.css">

</head>
<style>
    .row{
        margin-left: 5%;
        margin-right: 5%;
    }
    .box-header:hover{
        background-color: blue;
        color: white;
        cursor: pointer;
    }
    table{
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    th{
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
            <center>
                <div class="row">
                    <h1>Laporan mutasi penjualan</h1>
                </div>
            </center>
            <div>
                <center>
                    <div>
                        <div class="flexBox" >
                            <?php include 'application/views/nav_header_laporan.php'?>
                        </div>
                    </div>
                </center>
            </div>
            <div class="row" >
                <div class="col-md-2">
                    <form action="<?=base_url()?>laporan/buatLaporanMutasipenjualan" method="POST">
                        <input type="submit" value="buat laporan"  class="btn btn-info pull-left">
                    </form>
                </div>
            </div>
            <div class="">
                <div class="flexBox" >
                        <div class="col-md-6">
                            <h3>Header Penjualan</h3>
                            <table>
                                <tr>
                                    <th>id transaksi</th>
                                    <th>tanggal</th>
                                    <th>nama konsumen</th>
                                    <th>total</th>
                                    <th>status</th>
                                </tr>
                                <tr>
                                    <th>HJL0001</th>
                                    <th>19/9/2021</th>
                                    <th>konsumen 1</th>
                                    <th>2800</th>
                                    <th>sudah terbayar</th>
                                </tr>
                            </table>
                        </div>
                    
                        <div class="col-md-6">
                            <h3>Detail penjualan</h3>
                            <table>
                                <tr>
                                    <th>id transaksi</th>
                                    <th>id header</th>
                                    <th>nama pesanan</th>
                                    <th>kategori</th>
                                    <th>harga satuan</th>
                                    <th>jumlah</th>
                                    <th>subtotal</th>
                                </tr>
                                <tr>
                                    <th>DJL0001</th>
                                    <th>HJL0001</th>
                                    <th>makanan 1</th>
                                    <th>makanan</th>
                                    <th>2000</th>
                                    <th>4</th>
                                    <th>8000</th>
                                </tr>
                                <tr>
                                    <th>DJL0002</th>
                                    <th>HJL0001</th>
                                    <th>makanan 2</th>
                                    <th>makanan</th>
                                    <th>3000</th>
                                    <th>4</th>
                                    <th>12000</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <div class="control-sidebar-bg"></div>
    </div>
    <footer class="main-footer">

    </footer>
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
