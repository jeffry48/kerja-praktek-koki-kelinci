<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pembayaran Penjualan</title>

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
          overflow: auto;
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
            td:nth-of-type(1):before { content: "id jual"; }
            td:nth-of-type(2):before { content: "catatan"; }
            td:nth-of-type(3):before { content: "metode"; }
            td:nth-of-type(4):before { content: "nominal"; }
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
                                <h1>Pembayaran Penjualan </h1>
                                <br>
                                <button type="submit" class="btn btn-primary"> <a href="<?= base_url() ?>transaksi/Penjualan" style="color:white;">Kembali</a></button>
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
                                        <h3 class="card-title">Pembayaran Penjualan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="<?= base_url() ?>transaksi/KeNotaPenjualan" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <?php foreach($karyawan as $d): ?>
                                                    <h4>id Penjualan: <span><?php echo $d['id_hjual']; ?></span></h4><br>
                                                    <h4>tanggal: <span><?php echo $d['tanggal_jual']; ?></span></h4><br>
                                                    <?php
                                                        $sql2="SELECT * FROM konsumen WHERE id_konsumen='".$d['id_konsumen']."'";
                                                        $query2 = $this->db->query($sql2); 
                                                        $konsumen=$query2->result_array();
                                                    ?>
                                                    <h4>nama konsumen: <span><?php echo $konsumen[0]["nama_konsumen"]; ?></span></h4><br>
                                                    <h4>status: <span><?php echo $d['status_jual']; ?></span></h4><br>
                                                    <h4>total: Rp <span><?php echo number_format($d['total_jual'], 0, ".", "."); ?></span></h4><br>
                                                    <input type="hidden" name="idh" value="<?php echo $d['id_hjual']; ?>">
                                                    <input type="hidden" name="tgl" value="<?php echo $d['tanggal_jual']; ?>">
                                                    <input type="hidden" name="ids" value="<?php echo $d['id_konsumen']; ?>">
                                                    <input type="hidden" name="stat" value="<?php echo $d['status_jual']; ?>">
                                                    <input type="hidden" name="total" value="<?php echo $d['total_jual']; ?>">
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
                                    <form action="<?= base_url() ?>transaksi/TambahPelunasan" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                            <?php foreach($karyawan as $d): ?>
                                                <input type="hidden" name="nomh" value="<?php echo $d['total_jual']; ?>">
                                                <input type="hidden" name="idh" value="<?php echo $d['id_hjual']; ?>">
                                                <label for="nama">Tanggal Pembayaran</label>
                                                <input type="date" value="<?php echo date('Y-m-d'); ?>" name="tgl" class="form-control" id="nama" placeholder="Tanggal Pembayaran">
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
                                            <button class="btn btn-primary"><a style="color: white">Bayar</a></button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <div class="row">
                            <h4>Riwayat Pembayaran</h4>
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th>id jual</th>
                                        <th>catatan</th>
                                        <th>metode</th>
                                        <th>nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($karyawan2 as $d): ?>
                                    <tr>
                                        <td><?php echo $d['id_jual']; ?></td>
                                        <td><?php echo $d['note_jual']; ?></td>
                                        <td><?php echo $d['metode_jual']; ?></td>
                                        <td><?php echo $d['nominal_bayar']; ?></td>
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
            $('input#bayar').keyup(function(event) {
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
