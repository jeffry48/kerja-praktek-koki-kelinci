<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>laporan_penjualan_terbanyak</title>
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
            <?php include '../header.php' ?>
        </header>
        <aside class="main-sidebar">
            <?php include '../sidebar.php';?>
        </aside>

        <div class="content-wrapper">
            <center>
                <div class="row">
                    <h1>Laporan Penjualan Terbanyak</h1>
                </div>
            </center>
            <div>
                <center>
                    <div>
                        <div class="flexBox" >
                            <?php include '../nav_header_laporan.php'?>
                        </div>
                    </div>
                </center>
            </div>
            <form action="">
                <div class="row">
                    tanggal start: 
                    <input type="date" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;">
                    <br>
                    tanggal end: 
                    <input type="date" name="" id=""class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;">
                    <br>
                    <input type="submit" value="buat laporan"  class="btn btn-info pull-left">
                </div>
            </form>

            <div class="row" >
                <h4>id produk: <span>PRO0001</span></h4>
            </div>
            <div class="row" >
                <h4>nama produk: <span>aaaaaaaaaa</span></h4>
            </div>

            <div class="row">
                <table>
                    <tr>
                        <th>id transaksi</th>
                        <th>nama pesanan</th>
                        <th>nama customer</th>
                        <th>kategori</th>
                        <th>harga satuan</th>
                        <th>jumlah barang</th>
                        <th>subtotal</th>
                    </tr>
                    <tr>
                        <th>aaaaaa</th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa</th>
                    </tr>
                    <tr>
                        <th>aaaaaa</th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa</th>
                    </tr>
                </table>
            </div>
            <div class="row" >
                <h4>total: <span>0000000000</span></h4>
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
