<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tambah Penjualan</title>

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
            td:nth-of-type(1):before { content: "id transaksi"; }
            td:nth-of-type(2):before { content: "id produk"; }
            td:nth-of-type(3):before { content: "harga satuan"; }
            td:nth-of-type(4):before { content: "jumlah"; }
            td:nth-of-type(5):before { content: "sub total"; }
            td:nth-of-type(6):before { content: "action"; }
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
                                <h1>Tambah Penjualan Baru</h1>
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
                                        <h3 class="card-title">Tambah Penjualan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body">
                                        <form id="formTambahJual" action="<?= base_url() ?>transaksi/TambahPenjualan" method="post">
                                            <div class="form-group">
                                                <label for="nama">Konsumen</label>
                                                <select name="kons" id="idKon" class="form-control">
                                                    <?php foreach($karyawan1 as $d): ?>
                                                    <option value="<?php echo $d['id_konsumen']; ?>"><?php echo $d['nama_konsumen']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Tanggal Transaksi</label>
                                                <input type="date" name="tgl" class="form-control" id="tgl" placeholder="Tanggal Transaksi">
                                            </div>
                                        <!-- /.card-body -->
                                        </form>
                                        <form action="<?= base_url() ?>transaksi/TambahDetailPenjualan" method="post">
                                                <div class="form-group">
                                                    <label for="nama">Nama Pesanan</label>
                                                    <select name = "produk" id="nama" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="nama pesanan">
                                                        <?php foreach($karyawan2 as $d): ?>
                                                            <option value="<?php echo $d['id_produk']; ?>"><?php echo $d['nama_produk']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <h5>harga satuan: <span id="hargaPro">0</span></h5>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah Penjualan</label>
                                                    <input type="text" id="jumlah" name = "jumlah" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="jumlah">
                                                </div>
                                                <div class="form-group">
                                                    <h4>subtotal: <span id="subtotal">0</span></h4>
                                                </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <input type="hidden" id="hideIdKon" name="idKon">
                                                <input type="hidden" id="hideTglJual" name="tglJual">
                                                <button id="detailBtn" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>id transaksi</th>
                                                    <th>id produk</th>
                                                    <th>harga satuan</th>
                                                    <th>jumlah</th>
                                                    <th>sub total</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($karyawan as $d): ?>
                                                <tr>
                                                    <td><?php echo $d['id_djual']; ?></td>
                                                    <td><?php echo $d['id_produk']; ?></td>
                                                    <td><?php echo $d['subtotal']/$d['jumlah_jual']; ?></td>
                                                    <td><?php echo $d['jumlah_jual']; ?></td>
                                                    <td class="subtotals"><?php echo $d['subtotal']; ?></td>
                                                    <td>
                                                        <form action="<?= base_url() ?>transaksi/HapusDetailPenjualan" method="post">
                                                            <input type="hidden" name="idh" value="<?php echo $d['id_hjual']; ?>">
                                                            <input type="hidden" name="idd" value="<?php echo $d['id_djual']; ?>">
                                                            
                                                            <input type="hidden" id="<?php echo $d['id_djual']; ?>IdKon" name="idKon">
                                                            <input type="hidden" id="<?php echo $d['id_djual']; ?>TglJual" name="tglJual">
                                                            <button class="btn btn-primary" id="<?php echo $d['id_djual']; ?>" style="background-color: red;">Cancel</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <div class="form-group">
                                                <h4>total: <span id="total">0</span></h4>
                                            </div>
                                            <button type="submit" id="tambahBtn" class="btn btn-primary">Tambah Penjualan</button>
                                        </div>
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
                    console.log($(this).text());
                    total+=parseInt($(this).text());
                });
                $('#total').text(total);

                <?php
                    if(isset($idKon)){
                        echo '$("#idKon").val("'.$idKon.'").change();';
                    }
                    if(isset($tglJual)){
                        echo '$("#tgl").val("'.$tglJual.'");';
                    }
                ?>
            });
            $('#detailBtn').click(function(){
                $('#hideIdKon').val($('#idKon').val());
                $('#hideTglJual').val($('#tgl').val());
            });
            <?php
                foreach ($karyawan as $d ) {
                    echo '$("#'.$d['id_djual'].'").click(function(){
                        $("#'.$d['id_djual'].'IdKon").val($("#idKon").val());
                        $("#'.$d['id_djual'].'TglJual").val($("#tgl").val());
                    });
                    ';
                }
            ?>
            $('#nama').change(function(event) {
                var idPro=$(this).val();
                $.ajax({
                    type:"post", 
                    url: '<?php echo base_url()."ajax/ubahHargaTambahPenjualan"?>',
                    data:{idPro:idPro},
                    success:function(data){
                        var hasil=jQuery.parseJSON(data);
                        // console.log(hasil[0]['harga_produk']);
                        var hasil2=hasil[0]['harga_produk'].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        $('#hargaPro').text(hasil2);
                        
                        var harga=$('#hargaPro').text();
                        var jumlah=$('#jumlah').val();
                        harga = harga.replace(/\./g, "");
                        jumlah = jumlah.replace(/\./g, "");
                        var subtotal=parseInt(harga)*parseInt(jumlah);
                        $('#subtotal').text(subtotal.toLocaleString("id"));
                        if($('#subtotal').text()=="NaN"){
                            $('#subtotal').text("0");
                        }
                    }
                });
                return false;
            });
            $('#tambahBtn').click(function(){
                $('#formTambahJual').submit();
            });
            $('input#jumlah').keyup(function(event) {
                var harga=$('#hargaPro').text();
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
