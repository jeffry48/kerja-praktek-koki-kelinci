<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Template</title>
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
                <h3>Pembayaran Penjualan</h3>
                <div>
                    <button>kembali</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <h4>id penjualan: <span>HJL0001</span></h4>
                        <h4>tanggal penjualan: <span>19/9/2021</span></h4>
                        <h4>nama konsumen: <span>konsumen 1</span></h4>
                        <h4>status : <span style="color: red;">belum terbayar</span></h4>
                        <h4>total: <span>100000</span></h4>
                    </div>
                    <div class="row">
                        <button><a href="pembayaran_penjualan_sudah.php">print nota</a></button>
                    </div>
                </div>
                <div class="col-md-7">
                        <h4>form pembayaran</h4>
                    <!-- <div class="row">
                        tanggal pembayaran: <input type="date" name="" id="">
                    </div>
                    <div class="row">
                        jumlah pembayaran: <input type="text" name="" id="">
                    </div>
                    <div class="row">
                        note(optional): <input type="text" name="" id="">
                    </div>
                    <div class="row">
                        metode Pembayaran
                        <select name="" id="">
                            <option value="">transfer</option>
                            <option value="">cash</option>
                            <option value="">e-wallet</option>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <button><a href="pembayaran_penjualan_sudah.php">print nota</a></button>
                        <button>bayar</button>
                    </div> -->
                        tanggal pembayaran
                        <input type="date" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="tanggal pembayaran">
                        <br>
                        <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah pembayaran">
                        <br>
                        <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="note(optional)">
                        <br>
                        metode pembayaran
                        <select name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" >
                            <option value="">transfer</option>
                            <option value="">cash</option>
                            <option value="">e-wallet</option>
                        </select>
                        <br>
                        <button>bayar</button>
                </div>
            </div>
            <div class="row">
                <h3>Detail penjualan</h3>
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

        <footer class="main-footer">

        </footer>
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
