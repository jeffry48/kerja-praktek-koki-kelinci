<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>update_pembelian</title>
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
            <?php include 'application/views/sidebar.php'?>
        </aside>
        
        <div class="content-wrapper">
            <div class="row">
                <h3>Update Pembelian</h3>
                <div>
                    <button class="btn btn-info pull-left"><a style="color: white" href="<?= base_url() ?>transaksi/Pembelian">kembali</a></button>
                </div>
            </div>
            <br>

            <div class="row">
                <h4>id header: <span>HBL0001</span></h4>
                <br>
                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="nama supplier">
                <br>
                Tanggal Pembayaran: 
                <input type="date" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="tanggal">
                <br>
                <h4>total: <span>10000000</span></h4>
            </div>
            <div class="row">
                <h3>Detail</h3>
                <h4>id detail: <span>DBL0006</span></h4>
                nama pembelian: 
                <select name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="pemelian">
                    <option value="">bahan 1</option>
                    <option value="">bahan 2</option>
                    <option value="">bahan 3</option>
                    <option value="">bahan 4</option>
                    <option value="">bahan 5</option>
                    <option value="">bahan 6</option>
                </select>
                <br>
                <h4>harga satuan: <span>2000</span></h4>
                <br>
                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah">
                <br>
                <h4>subtotal: <span>8000</span></h4>
                <br>
            </div>

            <div class="row">
                <button class="btn btn-info pull-left"><a style="color: white" href="<?= base_url() ?>transaksi/updateDetailPembelian">update detail pembelian</a></button>
                <button class="btn btn-info pull-left" style="margin-left: 1%;"><a style="color: white" href="<?= base_url() ?>transaksi/updatePembelian">update pembelian</a></button>
            </div>
            <br>

            <div class="row">
                <table>
                    <tr>
                        <th>id transaksi</th>
                        <th>nama pembelian</th>
                        <th>harga satuan</th>
                        <th>jumlah</th>
                        <th>sub total</th>
                        <th>action</th>
                    </tr>
                    <tr>
                        <th>DBL0001</th>
                        <th>bahan 1</th>
                        <th>200</th>
                        <th>4</th>
                        <th>800</th>
                        <th><button class="btn btn-info pull-left" style="margin-left: 1%;">select</button></th>
                    </tr>
                    <tr>
                        <th>DBL0002</th>
                        <th>bahan 2</th>
                        <th>300</th>
                        <th>3</th>
                        <th>900</th>
                        <th><button class="btn btn-info pull-left" style="margin-left: 1%;">select</button></th>
                    </tr>
                </table>
            </div>
        </div>
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
