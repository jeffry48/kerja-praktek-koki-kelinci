<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>pembayaran_pembelian</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../../public/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../public/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../public/adminlte/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="../../public/adminlte/dist/css/skins/_all-skins.min.css">

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
            <?php include '../../header.php' ?>
        </header>
        <aside class="main-sidebar">
            <?php include '../../sidebar.php';?>
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
                <div class="col-md-5">
                    <div class="row">
                        id Pembelian: <span>HBL0001</span>
                    </div>
                    <div class="row">
                        tanggal: <span>19/9/2021</span>
                    </div>
                    <div class="row">
                        nama supplier: <span>supplier 1</span>
                    </div>
                    <div class="row">
                        status: <span style="color: red;">belum terbayar</span>
                    </div>
                    <div class="row">
                        <h4>detail Pembelian</h4>
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
                        <button><a href="pembayaran_pembelian_sudah.php">print nota</a></button>
                        <button>bayar</button>
                    </div>
                </div>
                
                <div class="col-md-7">
                    <div class="row">
                        <h4>form pembayaran</h4>
                    </div>
                    <div class="row">
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
