<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tambah Pembelian</title>

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

            td:nth-of-type(1):before { content: "id transaksi"; }
            td:nth-of-type(2):before { content: "id header"; }
            td:nth-of-type(3):before { content: "nama pembelian"; }
            td:nth-of-type(4):before { content: "harga satuan"; }
            td:nth-of-type(5):before { content: "jumlah"; }
            td:nth-of-type(6):before { content: "subtotal"; }
            td:nth-of-type(7):before { content: "action"; }
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
                                <h1>Tambah Pembelian Baru</h1>
                                <br>
                                <button type="submit" class="btn btn-primary"> <a href="<?= $this->config->item('backend_server_url') ?>transaksi/Pembelian" style="color:white;">Kembali</a></button>
                            <div>
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
                                        <h3 class="card-title">Tambah Pembelian Baru</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body">
                                        <form id="formTambahBeli" action="<?= $this->config->item('backend_server_url') ?>transaksi/TambahPembelian" method="post">
                                            <div class="form-group">
                                                <!-- <h4>id header: <span>HBL0001</span></h4> -->
                                                <label for="nama">Id Supplier</label>
                                                <select name="ids" class="form-control" id="idSup" >
                                                    <?php
                                                        $sql ="SELECT * FROM supplier";
                                                        $query = $this->db->query($sql); 
                                                        $dataSup = $query->result_array();
                                                        foreach ($dataSup as $d) {
                                                            echo '<option value="'.$d['id_supplier'].'">'.$d['nama_supplier'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Tanggal Pembelian</label>
                                                <input type="date" name="tglp" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="tglBeli" placeholder="Tanggal Pembayaran">
                                            </div>
                                            <!-- /.card-body -->
                                            
                                        </form>
                                        <form action="<?= $this->config->item('backend_server_url') ?>transaksi/TambahDetailPembelian" method="post">
                                            <div class="form-group">
                                                <!-- <h4>id detail: <span>DBL0006</span></h4> -->
                                                <label for="nama">Nama Pembelian</label> 
                                                <input type="text" name = "keterangan" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="nama pembelian">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Harga Satuan</label> 
                                                <input type="text" id="harga" name = "harga" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="harga satuan">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Jumlah</label>
                                                <input type="text" id="jumlah" name = "jumlah" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah">
                                            </div>
                                            <div class="form-group">
                                                <h4>subtotal: <span id="subtotal">0</span></h4>
                                            </div>    
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <input type="hidden" id="hideIdSup" name="idSup">
                                                <input type="hidden" id="hideTglBeli" name="tglBeli">
                                                <button type="submit" id="detailBtn" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                        <div class="table-responsive">
                                            <table id="tabelDetail">
                                                <thead>
                                                    <tr>
                                                        <th>id transaksi</th>
                                                        <th>nama pembelian</th>
                                                        <th>harga satuan</th>
                                                        <th>jumlah</th>
                                                        <th>sub total</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($karyawan as $d): ?>
                                                    <tr>
                                                        <td><?php echo $d['id_dbeli']; ?></td>
                                                        <td><?php echo $d['nama_pembelian']; ?></td>
                                                        <td class="harga">Rp <?php echo number_format($d['subtotal']/$d['jumlah_beli'], 0, ".", "."); ?></td>
                                                        <td><?php echo $d['jumlah_beli']; ?></td>
                                                        <td class="harga">Rp <span class="subtotals"><?php echo number_format($d['subtotal'], 0, ".", "."); ?></span></td>
                                                        <td>
                                                            <form action="<?= $this->config->item('backend_server_url')?>transaksi/HapusDetailPembelian" method="post">
                                                                <input type="hidden" name="idh" value="<?php echo $d['id_hbeli']; ?>">
                                                                <input type="hidden" name="idd" value="<?php echo $d['id_dbeli']; ?>">

                                                                <input type="hidden" id="<?php echo $d['id_dbeli']; ?>IdSup" name="idSup">
                                                                <input type="hidden" id="<?php echo $d['id_dbeli']; ?>TglBeli" name="tglBeli">
                                                                <button class="btn btn-primary" id="<?php echo $d['id_dbeli']; ?>" style="background-color: red;">Cancel</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <h4>Total: Rp <span id="total">0</span></h4>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" form="formTambahBeli" id="tambahBeli" class="btn btn-primary">Tambah Pembelian</button>
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
            });
            $(document).ready(function(){
                var total = 0;
                $('.subtotals').each(function () {
                    // console.log($(this).text());
                    var currSub=$(this).text();
                    currSub=currSub.replaceAll(".", "");
                    total+=parseInt(currSub);
                });
                $('#total').text(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                <?php
                    if(isset($idSup)){
                        echo '$("#idSup").val("'.$idSup.'").change();';
                    }
                    if(isset($tglBeli)){
                        echo '$("#tglBeli").val("'.$tglBeli.'");';
                    }
                ?>
            });
            

            $('#tambahBeli').click(function(){
                $("#formTambahBeli").submit();
            });
            $('#detailBtn').click(function(){
                $('#hideIdSup').val($('#idSup').val());
                $('#hideTglBeli').val($('#tglBeli').val());

                var harga=$('#harga').val();
                var jumlah=$('#jumlah').val();
                harga=harga.replaceAll(".", "");
                jumlah=jumlah.replaceAll(".", "");
                $('#harga').val(harga);
                $('#jumlah').val(jumlah);
            });
            <?php
                foreach ($karyawan as $d ) {
                    echo '$("#'.$d['id_dbeli'].'").click(function(){
                        $("#'.$d['id_dbeli'].'IdSup").val($("#idSup").val());
                        $("#'.$d['id_dbeli'].'TglBeli").val($("#tglBeli").val());
                    });
                    ';
                }
            ?>

            $('input#harga').keyup(function(event) {
                var harga=$('#harga').val();
                var jumlah=$('#jumlah').val();
                harga = harga.replace(/\./g, "");
                jumlah = jumlah.replace(/\./g, "");
                var subtotal=parseInt(harga)*parseInt(jumlah);
                $('#subtotal').text(subtotal.toLocaleString("id"));
                if($('#subtotal').text()=="NaN"){
                    $('#subtotal').text("0");
                }
                if(event.which >= 37 && event.which <= 40) return;
                $(this).val(function(index, value) {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                ;
                });
            });
            $('input#jumlah').keyup(function(event) {
                var harga=$('#harga').val();
                var jumlah=$('#jumlah').val();
                harga = harga.replace(/\./g, "");
                jumlah = jumlah.replace(/\./g, "");
                var subtotal=parseInt(harga)*parseInt(jumlah);
                $('#subtotal').text(subtotal.toLocaleString("id"));
                if($('#subtotal').text()=="NaN"){
                    $('#subtotal').text("0");
                }

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
