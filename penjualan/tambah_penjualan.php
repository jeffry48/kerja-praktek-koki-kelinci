<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>tembah_penjualan</title>
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
            <?php include '../header.php' ?>
        </header>
        <aside class="main-sidebar">
            <?php include '../sidebar.php';?>
        </aside>

        <div class="content-wrapper">
            <div class="row">
                <h3>Tambah Penjualan Baru</h3>
                <div>
                    <button>kembali</button>
                </div>
            </div>
            <br>
            <div class="col-md-5">
                <div class="row">
                    id header: <span>HJL0001</span>
                </div>
                <div class="row">
                    nama konsumen: 
                    <input type="text" name="" id="">
                </div>
                <div class="row">
                    tanggal: 
                    <input type="date" name="" id="">
                </div>
                <div class="row">
                    total: <span>10000000</span>
                </div>
                <div class="row">
                    <h3>Detail</h3>
                </div>
                <div class="row">
                    id detail: <span>DJL0006</span>
                </div>
                <div class="row">
                    nama pesanan: 
                    <select name="" id="">
                        <option value="">makanan 1</option>
                        <option value="">makanan 2</option>
                        <option value="">makanan 3</option>
                        <option value="">minuman 1</option>
                        <option value="">minuman 2</option>
                        <option value="">minuman 3</option>
                    </select>
                </div>
                <div class="row">
                    kategori: <span>makanan</span>
                </div>
                <div class="row">
                    harga satuan: <span>2000</span>
                </div>
                <div class="row">
                    jumlah: <input type="text" name="" id="">
                </div>
                <div class="row">
                    subtotal: <span>8000</span>
                </div>
                <div class="row">
                    <button>tambah detail penjualan</button>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <button>tambah penjualan</button>
                </div>
            </div>
            <div class="col-md-7">
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
