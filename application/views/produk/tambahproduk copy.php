<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tambah Produk</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        th
        {
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
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <?php include 'application/views/header.php'; ?>
        </header>

        <aside class="main-sidebar">
            <?php include 'application/views/sidebar.php';?>
        </aside>

        <div class="content-wrapper">
        <h2 style="float:left;padding-left:2%;padding-top:3%;">Tambah Produk Baru</h3>
                <div class="row" style="margin-left:2%;">
                    <div class="col-md-5-left" style="padding-top:12%;padding-right:65%;padding-left:0%;width:150%;">
                        <div class="box">
                            <div class="box-header">
                                <form action = "TambahProduk" method = "post">
                                    <div class="form-group">
                                        <input type="text" name = "namaPro" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Nama Produk">
                                        <br>
                                        <input type="text" name = "hargaPro" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Harga Produk">
                                        <br>
                                        Kategori: 
                                        <select name = "kategoriPro" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" >
                                            <?php
                                                for ($i=0; $i < count($_SESSION['dataKategori']); $i++) { 
                                                    $currData=$_SESSION['dataKategori'][$i];
                                                    echo '
                                                        <option value="'.$currData['id_kategori'].'">'.$currData['nama_kategori'].'</option>
                                                    ';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-info pull-left" value = "Tambah">
                                </form>
                            </div>
                        </div>
                        
                    </div> 
                </div>
            </center>
        </div>

        <!-- <footer class="main-footer">

        </footer> -->
        <!-- <div class="control-sidebar-bg"></div> -->
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
