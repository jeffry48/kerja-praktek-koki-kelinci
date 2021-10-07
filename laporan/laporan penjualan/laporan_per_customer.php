<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>laporan_per_customer</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../../public/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../public/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../public/adminlte/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="../../public/adminlte/dist/css/skins/_all-skins.min.css">

</head>
<style>
    .box-header:hover{
        background-color: blue;
        color: white;
        cursor: pointer;
    }
    table, th, td {
        border: 1px solid black;
        background-color: white;
        padding: 5px;
    }
</style>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <?php include '../../header.php' ?>
        </header>
        <aside class="main-sidebar">
            <?php include '../../sidebar.php';?>
        </aside>

        <div class="content-wrapper">
            <center>
                <div class="row">
                    <h1>Laporan per customer</h1>
                </div>
            </center>
            <div class="row">
                <center>
                    <div class="row" style="padding-left: 2%; padding-right: 2%;">
                        <div class="flexBox" style="
                            display: flex;
                            flex-flow: row wrap;
                            justify-content: center;">
                            <?php include '../nav_header_laporan.php'?>
                        </div>
                    </div>
                </center>
            </div>
            <form action="">
                <div class="row" style="padding-left: 2%;">
                    nama customer
                    <input type="text" name="" id="">
                </div>
                <div class="row" style="padding-left: 2%;">
                    tanggal start: 
                    <input type="date" name="" id="">
                </div>
                <div class="row" style="padding-left: 2%;">
                    tanggal end: 
                    <input type="date" name="" id="">
                </div>

                <br>
                <div class="row" style="padding-left: 2%;">
                    <input type="submit" value="buat laporan">
                </div>
            </form>

            <div class="row" style="padding-left: 2%;">
                <h4>id customer: <span>CUS00000000</span></h4>
            </div>

            <div class="row" style="margin-top: 2%; padding-left: 2%; padding-right: 5%;">
                <table>
                    <tr>
                        <th>id transaksi</th>
                        <th>nama pesanan</th>
                        <th>kategori</th>
                        <th>harga satuan</th>
                        <th>jumlah pesanan</th>
                        <th>subtotal</th>
                    </tr>
                    <tr>
                        <th>aaaaaa</th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa</th>
                        <th>aaaaaa</th>
                    </tr>
                    <tr>
                        <th>aaaaaa</th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa </th>
                        <th>aaaaaa</th>
                    </tr>
                </table>
            </div>
            <div class="row" style="padding-left: 3%;">
                <h4>total: <span>0000000000</span></h4>
            </div>
    </div>
    <footer class="main-footer">
        
    </footer>
    <script src="../../public/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../public/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../public/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../../public/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script src="../../public/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="../../public/adminlte/dist/js/adminlte.min.js"></script>
    <script src="../../public/adminlte/dist/js/demo.js"></script>

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
