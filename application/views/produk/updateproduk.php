<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Produk</title>
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
            <h2 style="float:left;padding-left:35%;padding-top:3%;">Update Produk</h3>
                <div class="row" style="margin-left:31%;">
                    <div class="col-md-5-left" style="padding-top:20%;padding-right:55%;padding-left:5.9%;">
                        <div class="box">
                            <div class="box-header">
                                <form action = "UpdateProduk" method = "post">
                                    <div class="form-group">
                                        <input type="text" name = "namaPro" class="form-control" value="<?php echo $_SESSION['currProData']['nama_produk']?>" style="border-color: #0d74a3; box-shadow: none;width:90%;" placeholder="Nama Produk">
                                        <br>
                                        <input type="text" name = "hargaPro" class="form-control" value="<?php echo $_SESSION['currProData']['harga_produk']?>"  style="border-color: #0d74a3; box-shadow: none;width:90%;" placeholder="Harga Produk">
                                        <br>
                                        <?php 
                                            $namaKat="";
                                            for ($j=0; $j < count($_SESSION['dataKategori']); $j++) { 
                                                if($_SESSION['currProData']['id_kategori']==$_SESSION['dataKategori'][$j]['id_kategori']){
                                                    $namaKat=$_SESSION['dataKategori'][$j]['nama_kategori'];
                                                }
                                            };
                                        ?>
                                        Kategori: 
                                        <select name = "katPro" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:75%;" >
                                            <option value="" selected disabled hidden><?php echo $namaKat;?></option>
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
                                    <input type="hidden" name="idPro" value="<?php echo $_SESSION['currProData']['id_produk']?>">
                                    <input type="submit" class="btn btn-info pull-left" value = "Update">
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
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
