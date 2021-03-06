<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pembayaran Pembelian</title>

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
        .harga{
            text-align: right;
        }
        @media (max-width: 800px) {
            /* .row{
                margin-left: 1%;
                margin-right: 1%;
            } */
            .harga{
                text-align: left;
            }

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

            td:nth-of-type(1):before { content: "id beli"; }
            td:nth-of-type(2):before { content: "id header"; }
            td:nth-of-type(3):before { content: "catatan"; }
            td:nth-of-type(4):before { content: "metode"; }
            td:nth-of-type(5):before { content: "nominal"; }
            /* td:nth-of-type(1):before { content: ""; }
            td:nth-of-type(2):before { content: ""; }
            td:nth-of-type(3):before { content: ""; }
            td:nth-of-type(4):before { content: ""; }
            td:nth-of-type(5):before { content: ""; } */
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
                                <h1>Pembayaran Pembelian </h1>
                                <br>
                                <button type="submit" class="btn btn-primary"> <a href="<?= $this->config->item('backend_server_url') ?>transaksi/Pembelian" style="color:white;">Kembali</a></button>
                            <div>
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
                                        <h3 class="card-title">Pembayaran Pembelian</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= $this->config->item('backend_server_url') ?>transaksi/KeNotaPembelian" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <?php foreach($karyawan as $d): ?>
                                                    <h4>id Pembelian: <span><?php echo $d['id_hbeli']; ?></span></h4><br>
                                                    <h4>tanggal: <span><?php echo $d['tanggal_beli']; ?></span></h4><br>
                                                    <?php
                                                        $sql ="SELECT * FROM supplier where id_supplier='".$d['id_supplier']."'";
                                                        $query = $this->db->query($sql); 
                                                        $supplier = $query->result_array(); 
                                                    ?>
                                                    <h4>nama supplier: <span><?php echo $supplier[0]['nama_supplier']; ?></span></h4><br>
                                                    <h4>status: <span><?php echo $d['status_beli']; ?></span></h4><br>
                                                    <h4>total: Rp <span><?php echo number_format($d['total_beli'], 0, ".", "."); ?></span></h4><br>
                                                    <input type="hidden" name="idh" value="<?php echo $d['id_hbeli']; ?>">
                                                    <input type="hidden" name="tgl" value="<?php echo $d['tanggal_beli']; ?>">
                                                    <input type="hidden" name="ids" value="<?php echo $d['id_supplier']; ?>">
                                                    <input type="hidden" name="stat" value="<?php echo $d['status_beli']; ?>">
                                                    <input type="hidden" name="total" value="<?php echo $d['total_beli']; ?>">
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Nota</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Form Pembayaran</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= $this->config->item('backend_server_url') ?>transaksi/TambahPembayaran" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                            <?php foreach($karyawan as $d): ?>
                                                <input type="hidden" name="nomh" value="<?php echo $d['total_beli']; ?>">
                                                <input type="hidden" name="idh" value="<?php echo $d['id_hbeli']; ?>">
                                                <label for="nama">Tanggal Pembayaran</label>
                                                <input type="date" name="tgl" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="nama" placeholder="Tanggal Pembayaran">
                                                <br>
                                                <label for="nama">Jumlah Bayar</label>
                                                <input type="text" name = "jumlah" id="bayar" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah pembayaran">
                                                <br>
                                                <label for="nama">Note ( optional )</label>
                                                <input type="text" name = "note" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="note(optional)">
                                                <br>
                                                <label for="nama">Metode Pembayaran</label>
                                                <select name = "metode" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" >
                                                    <option value="transfer">transfer</option>
                                                    <option value="cash">cash</option>
                                                    <option value="e-wallet">e-wallet</option>
                                                </select>
                                            <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button class="btn btn-primary"><a id="bayarBtn" style="color: white">Bayar</a></button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id pembayaran</th>
                                        <th>catatan</th>
                                        <th>metode</th>
                                        <th>nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($karyawan2 as $d): ?>
                                        <tr>
                                            <td><?php echo $d['id_beli']; ?></td>
                                            <td><?php echo $d['note_beli']; ?></td>
                                            <td><?php echo $d['metode_bayar']; ?></td>
                                            <td class="harga">Rp <?php echo number_format($d['nominal_bayar'], 0, ".", "."); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                
                            </table>
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
        </script>
    </body>
</html>
