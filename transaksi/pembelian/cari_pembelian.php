<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>cari_pembelian</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <link rel="stylesheet" href="../../public/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/adminlte/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../../public/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../public/adminlte/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="../../public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">

</head>
<style>
    .row{
        margin-left: 5%;
    }
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
            <div class="row">
                <h3>Daftar Pembelian</h3>
            </div>
            <div class="row">
                <button><a href="tambah_pembelian.php">Tambah Pembelian</a></button>
            </div>
            <div class="row">
                <h4>Pencarian</h4>
            </div>

            <div class="row">
                <div class="flexBox" style="
                        display: flex;
                        flex-flow: row wrap;
                        justify-content: center;">
                        <div class="col-md-5">
                            <form action="">
                                <div class="row" style="margin-left: 0%;">
                                    id header: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    nama supplier: 
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    tanggal start: &nbsp&nbsp
                                    <input type="date" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    tanggal end: &nbsp&nbsp&nbsp
                                    <input type="date" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    total start: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    total end: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    status: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <select name="" id="">
                                        <option value="" style="color: green;">sudah terbayar</option>
                                        <option value="" style="color: red;">belum terbayar</option>
                                    </select>
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    <input type="submit" value="cari">
                                    <button>clear</button>
                                </div>
                            </form>
                            

                            <h3>Header pembelian</h3>
                            <table>
                                <tr>
                                    <th>id transaksi</th>
                                    <th>tanggal</th>
                                    <th>nama supplier</th>
                                    <th>total</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                                <tr>
                                    <th>HBL0001</th>
                                    <th>19/9/2021</th>
                                    <th>supplier 1</th>
                                    <th>2800</th>
                                    <th>sudah terbayar</th>
                                    <th>
                                        <center>
                                            <button><a href="tambah_pembayaran.php">update</a></button><br>
                                            <button><a href="#">hapus</a></button><br>
                                            <button><a href="pembayaran_pembelian.php">bayar</a></button>
                                        </center>
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-6" style="padding-right: 5%;">
                            <form action="">
                                <div class="row" style="margin-left: 0%;">
                                    id detail: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    id header: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    nama pembelian: &nbsp&nbsp
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    harga satuan start: 
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    harga satuan end: &nbsp
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    jumlah start: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    jumlah end: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    subtotal start: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    subtotal end: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input type="text" name="" id="">
                                </div>
                                <div class="row" style="margin-left: 0%;">
                                    <input type="submit" value="cari">
                                    <button>clear</button>
                                </div>
                            </form>

                            
                            

                            <h3>Detail pembelian</h3>
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
                                    <th>bahan 123456</th>
                                    <th>20000</th>
                                    <th>4</th>
                                    <th>80000</th>
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
                    </div>
                </div>
            </div>
        <footer class="main-footer">

        </footer>
        <div class="control-sidebar-bg"></div>
    </div>

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
