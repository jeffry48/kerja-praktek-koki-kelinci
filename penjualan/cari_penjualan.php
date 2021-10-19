<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>cari_penjualan</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <link rel="stylesheet" href="../public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/adminlte/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../public/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../public/adminlte/dist/css/AdminLTE.css">

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
            <div class="row">
                <h3>Daftar Penjualan</h3>
            </div>
            <div class="row">
                <button class="btn btn-info pull-left"><a style="color: white" href="tambah_penjualan.php">tambah penjualan</a></button>
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
                            <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Id Header">
                                <br>
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="nama konsumen">                        
                                <br>
                                tanggal start: 
                                <input type="date" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="tanggal start">
                                <br>
                                tanggal start: 
                                <input type="date" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="tanggal end">                                
                                <br>
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="total start">                        
                                <br>
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="total end">
                                <br>                                
                                
                                <select name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;">
                                    <option value="" style="color: green;">sudah terbayar</option>
                                    <option value="" style="color: red;">belum terbayar</option>
                                </select>
                                <br>
                                <div class="row" style="margin-left: 0%;">
                                    <input type="submit" class="btn btn-info pull-left" value = "Cari" style="">
                                    <button class="btn btn-info pull-left" style="margin-left: 1%;">clear</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-1"></div>
                        <div class="col-md-6" style="padding-right: 5%;">
                            <form action="">
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Id detail">
                                <br>
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="id header">                        
                                <br>
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="nama pesanan">
                                <br>
                                kategori: 
                                <select name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;">
                                    <option value="makanan">makanan</option>
                                    <option value="minuman">makanan</option>
                                </select>
                                <br>
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="harga satuan start">                                
                                <br>
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="harga satuan end">                        
                                <br>
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah start">
                                <br>    
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah end">
                                <br>
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="subtotal start">                        
                                <br>
                                <input type="text" name = "no" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="subtotal end">
                                <br> 
                                <div class="row" style="margin-left: 0%;">
                                    <input type="submit" class="btn btn-info pull-left" value = "Cari" style="">
                                    <button class="btn btn-info pull-left" style="margin-left: 1%;">clear</button>
                                </div>
                            </form>

 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3>Header Penjualan</h3>
                    <table>
                        <tr>
                            <th>id transaksi</th>
                            <th>tanggal</th>
                            <th>nama konsumen</th>
                            <th>total</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                        <tr>
                            <th>HJL0001</th>
                            <th>19/9/2021</th>
                            <th>konsumen 1</th>
                            <th>2800</th>
                            <th>sudah terbayar</th>
                            <th>
                                <center>
                                    <button class="btn btn-info pull-left"><a style="color: white"  href="tambah_penjualan.php">Update</a></button>
                                    <button type="button" class="btn btn-info pull-left" style="margin-left: 1%;" data-toggle="modal" data-target="#modalHapus">
                                        hapus
                                    </button>
                                    <!-- modal -->
                                    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalHapusLabel">Hapus penjualan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">batal</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color: red;">hapus</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <button class="btn btn-info pull-left" style="margin-left: 1%;"><a style="color: white" href="pembayaran_penjualan.php">Bayar</a></button>
                                    <button type="button" class="btn btn-info pull-left" style="margin-left: 1%;" data-toggle="modal" data-target="#modalDetail">
                                        detail
                                    </button>
                                    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalDetailLabel">Detail penjualan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                </center>
                            </th>
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
