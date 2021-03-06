<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Produk</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">

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
        a{
            color: white;
        }
                
        @media (max-width: 800px) {
            /* .row{
                margin-left: 1%;
                margin-right: 1%;
            } */
            .col-sm-6{
                width: 50%;
                float: left;
            }
            .btn{
                margin-top: 2%;
                /* margin-left: 1%; */
            }
            
            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr { 
                display: block; 
            }
            
            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr { 
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            
            tr { border: 1px solid #ccc; }
            
            td { 
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee; 
                position: relative;
                text-align: left;
            }
            
            td:before { 
                /* Now like a table header */
                /* position: absolute; */
                /* Top/left values mimic padding */
                
                width: 45%; 
                padding-right: 10px; 
                white-space: nowrap;
            }
            
            /*
            Label the data
            */
            td:nth-of-type(1):before { content: "Id Produk"; }
            td:nth-of-type(2):before { content: "Nama Produk"; }
            td:nth-of-type(3):before { content: "Kategori Produk"; }
            td:nth-of-type(4):before { content: "Harga Produk"; }
            td:nth-of-type(5):before { content: "Action"; }
            
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
                                <h1>Produk</h1>
                                <br>
                                <button type="submit" class="btn btn-primary"> <a href="<?= $this->config->item('backend_server_url') ?>keTambahProduk">Tambah baru</a></button>
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
                                        <h3 class="card-title">Pencarian</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= $this->config->item('backend_server_url') ?>CariProduk" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="keyword">Nama Produk</label>
                                                <input type="text" name="keyword" class="form-control" id="keyword" placeholder="Nama Produk">
                                            </div>
                                            <div class="form-group">
                                                <label for="hargaStart">Harga Produk Mulai</label>
                                                <input type="text" name="hargaStart" class="form-control" id="hargaStart" placeholder="Harga Produk Mulai">
                                            </div>
                                            <div class="form-group">
                                                <label for="hargaEnd">Harga Produk Akhir</label>
                                                <input type="text" name="hargaEnd" class="form-control" id="hargaEnd" placeholder="Harga Produk Akhir">
                                            </div>
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <select name="kategoriPro" id="kategori" class="form-control">
                                                    <option value="all">All</option>
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
                                        </div>

                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                        
                                    </form>
                                    <div class="table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Id Produk</th>
                                                    <th>Nama Produk</th>
                                                    <th>Kategori Produk</th>
                                                    <th>Harga Produk</th>
                                                    <th colspan="2" style="align-items: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                if (isset($_SESSION['hasilSearchPro'])) {
                                                    for ($i=0; $i < count($_SESSION['hasilSearchPro']); $i++) { 
                                                        $currData=$_SESSION['hasilSearchPro'][$i];
                                                        $namaKat="";
                                                        for ($j=0; $j < count($_SESSION['dataKategori']); $j++) { 
                                                            if($currData['id_kategori']==$_SESSION['dataKategori'][$j]['id_kategori']){
                                                                $namaKat=$_SESSION['dataKategori'][$j]['nama_kategori'];
                                                            }
                                                        }
                                                        echo '
                                                        <tr>
                                                            <td>'.$currData['id_produk'].'</td>
                                                            <td>'.$currData['nama_produk'].'</td>
                                                            <td>'.$namaKat.'</td>
                                                            <td style="text-align: right;">Rp '.number_format($currData['harga_produk'], 0, ".", ".").'</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <div class="col-sm-6">
                                                                        <form action="'.$this->config->item('backend_server_url').'HapusProduk" method="post">
                                                                            <input type="hidden" name="idPro" value="'.$currData['id_produk'].'">
                                                                            <input type="submit" class="btn btn-info pull-left" value = "Hapus" >
                                                                        </form>                                                                    
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <form action="'.$this->config->item('backend_server_url').'keUpdateProduk" method="post">
                                                                            <input type="hidden" name="idPro" value="'.$currData['id_produk'].'">
                                                                            <input type="submit" class="btn btn-info pull-left" value = "Update" >
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>';
                                                    }
                                                }
                                                else{
                                                    for ($i=0; $i < count($_SESSION['dataProduk']); $i++) { 
                                                        $currData=$_SESSION['dataProduk'][$i];
                                                        $namaKat="";
                                                        for ($j=0; $j < count($_SESSION['dataKategori']); $j++) { 
                                                            if($currData['id_kategori']==$_SESSION['dataKategori'][$j]['id_kategori']){
                                                                $namaKat=$_SESSION['dataKategori'][$j]['nama_kategori'];
                                                            }
                                                        }
                                                        
                                                        echo '
                                                        <tr>
                                                            <td>'.$currData['id_produk'].'</td>
                                                            <td>'.$currData['nama_produk'].'</td>
                                                            <td>'.$namaKat.'</td>
                                                            <td style="text-align: right;">Rp '.number_format($currData['harga_produk'], 0, ".", ".").'</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <div class="col-sm-6">
                                                                        <form action="'.$this->config->item('backend_server_url').'HapusProduk" method="post">
                                                                            <input type="hidden" name="idPro" value="'.$currData['id_produk'].'">
                                                                            <input type="submit" class="btn btn-info pull-left" value = "Hapus" >
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <form action="'.$this->config->item('backend_server_url').'keUpdateProduk" method="post">
                                                                            <input type="hidden" name="idPro" value="'.$currData['id_produk'].'">
                                                                            <input type="submit" class="btn btn-info pull-left" value = "Update" >
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>';
                                                    }
                                                }
                                                    
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>
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
                <?php
                if(isset($_SESSION['success'])){
                    echo '$("#myModal").modal("show");';
                }
                ?>
            });
            $('input#hargaStart').keyup(function(event) {
                if(event.which >= 37 && event.which <= 40) return;
                $(this).val(function(index, value) {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                ;
                });
            });
            $('input#hargaEnd').keyup(function(event) {
                if(event.which >= 37 && event.which <= 40) return;
                $(this).val(function(index, value) {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                ;
                });
            });
        </script>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel"></h5>
            </div>
            <div class="modal-body">
                <?php 
                echo $_SESSION['success']; 
                $_SESSION['success']=null;
                ?>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    </body>
</html>
