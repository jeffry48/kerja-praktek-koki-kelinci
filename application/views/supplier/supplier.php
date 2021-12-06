<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Supplier</title>

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
            td:nth-of-type(1):before { content: "Id Pelanggan"; }
            td:nth-of-type(2):before { content: "Nama Pelanggan"; }
            td:nth-of-type(3):before { content: "Alamat Pelanggan"; }
            td:nth-of-type(4):before { content: "Nomor Telepon Pelanggan"; }
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
                                <h1>Supplier</h1>
                                <br>
                                <button type="submit" class="btn btn-primary"> <a href="<?= base_url() ?>keTambahSupplier">Tambah baru</a></button>
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
                                    <form action="<?= base_url() ?>CariSupplier" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama">Nama Supplier</label>
                                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Supplier">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Alamat Supplier</label>
                                                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Supplier">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">No Telepon Supplier</label>
                                                <input type="text" name="nohp" class="form-control" id="nohp" placeholder="No Telepon Supplier">
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
                                                    <th>Id Supplier</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Alamat Supplier</th>
                                                    <th>Nomor Telepon Supplier</th>
                                                    <th colspan="2">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($karyawan as $d): ?>
                                                <tr>
                                                    <td><?php echo $d['id_supplier']; ?></td>
                                                    <td><?php echo $d['nama_supplier']; ?></td>
                                                    <td><?php echo $d['alamat_supplier']; ?></td>
                                                    <td><?php echo $d['no_telp_supplier']; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <div class="col-sm-6">
                                                                <form action="<?= base_url() ?>HapusSupplier" method="post">
                                                                    <input type="submit" class="btn btn-info pull-left" value = "Hapus" style="">
                                                                    <input type="hidden" name="id" value="<?= $d['id_supplier']; ?>">
                                                                </form>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <form action="<?= base_url() ?>KeUpdateSupplier" method="post">
                                                                    <input type="submit" class="btn btn-info pull-left" value = "Update" style="">
                                                                    <input type="hidden" name="id" value="<?= $d['id_supplier']; ?>">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
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
