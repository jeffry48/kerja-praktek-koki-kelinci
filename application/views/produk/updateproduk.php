<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>update produk</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">

    <style>
        table{
            width: 100%;
        }
    </style>
    </head>
    <body class="hold-transition sidebar-mini sidebar-collapse">
        <?php include 'application/views/header.php'; ?>
        <?php include 'application/views/sidebar.php';?>
        <div class="wrapper">
            <!-- Navbar -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Kategori</h1>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Update Produk</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= base_url() ?>UpdateProduk" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama">Nama Produk</label>
                                                <input type="text" value="<?php echo $_SESSION['currProData']['nama_produk']?>" name="namaPro" class="form-control" id="nama" placeholder="Nama Produk">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Harga Produk</label>
                                                <input type="text" value="<?php echo $_SESSION['currProData']['harga_produk']?>" name="hargaPro" class="form-control" id="nama" placeholder="Harga Produk">
                                            </div>
                                            <?php 
                                                $namaKat="";
                                                $idKat="";
                                                for ($j=0; $j < count($_SESSION['dataKategori']); $j++) { 
                                                    if($_SESSION['currProData']['id_kategori']==$_SESSION['dataKategori'][$j]['id_kategori']){
                                                        $namaKat=$_SESSION['dataKategori'][$j]['nama_kategori'];
                                                        $idKat=$_SESSION['dataKategori'][$j]['id_kategori'];
                                                    }
                                                };
                                            ?>
                                            <div class="form-group">
                                                <label for="nama">Kategori Produk</label>
                                                <select name="katPro" id=""class="form-control">
                                                    <option value="<?php echo $idKat;?>" selected><?php echo $namaKat;?></option>
                                                    <?php
                                                        for ($i=0; $i < count($_SESSION['dataKategori']); $i++) { 
                                                            $currData=$_SESSION['dataKategori'][$i];
                                                            if ($currData['nama_kategori']!=$namaKat) {
                                                                echo '
                                                                    <option value="'.$currData['id_kategori'].'">'.$currData['nama_kategori'].'</option>
                                                                ';
                                                            }
                                                        }
                                                    ?>
                                                </select>                                            
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <input type="hidden" name="idPro" value="<?php echo $_SESSION['currProData']['id_produk']?>">
                                            <button type="submit" class="btn btn-primary">Update Produk</button>
                                        </div>
                                        
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.2.0-rc
                </div>
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer> -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="<?= base_url() ?>assets/backend/css/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url() ?>assets/backend/css/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="<?= base_url() ?>assets/backend/css/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>assets/backend/css/adminlte/dist/js/adminlte.min.js"></script>
        <!-- Page specific script -->
        <script>
            $(function () {
                bsCustomFileInput.init();
            });
            $('input#hargaPro').keyup(function(event) {
                if(event.which >= 37 && event.which <= 40) return;
                $(this).val(function(index, value) {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                ;
                });
            });
        </script>
    </body>
</html>
