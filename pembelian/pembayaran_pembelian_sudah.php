<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>pembayaran_pembelian_sudah</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../public/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../public/adminlte/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="../public/adminlte/dist/css/skins/_all-skins.min.css">

</head>
<style>
    .row{
        margin-left: 5%;
        margin-right: 5%;
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
            <?php include '../header.php' ?>
        </header>
        <aside class="main-sidebar">
            <?php include '../sidebar.php';?>
        </aside>

        <div class="content-wrapper">
            <div class="row">
                <h3>Pembayaran Pembelian</h3>
                <div>
                    <button>kembali</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <h4>id Pembelian: <span>HBL0001</span></h4>
                        <h4>tanggal: <span>19/9/2021</span></h4>
                        <h4>status: <span style="color: green;">sudah terbayar</span></h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <h4>nama supplier: <span>supplier 1</span></h4>
                        <h4>total: <span>100000</span></h4>
                        <br>
                        <br>
                    </div>
                </div>
                


                <div class="row">
                    <h3>detail Pembelian</h3>
                </div>
                <div class="row">
                    <table>
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
                            <th>bahan 1</th>
                            <th>200</th>
                            <th>4</th>
                            <th>800</th>
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
                <br>
                <div class="row">
                    <h4>Riwayat penjualan</h4>
                    <table>
                        <tr>
                            <th>tanggal pembayaran</th>
                            <th>metode pembayaran</th>
                            <th>note</th>
                            <th>jumlah pembayaran</th>
                        </tr>
                        <tr>
                            <th>aaaa</th>
                            <th>bbbbb</th>
                            <th>ccccc</th>
                            <th>ddddd</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="control-sidebar-bg"></div>
    </div>

    <script src="../public/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../public/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../public/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../public/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script src="../public/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="../public/adminlte/dist/js/adminlte.min.js"></script>
    <script src="../public/adminlte/dist/js/demo.js"></script>

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
