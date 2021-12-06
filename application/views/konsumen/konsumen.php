<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cari Customer</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
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
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
        
    <?php include 'application/views/header.php'; ?>
    <?php include 'application/views/sidebar.php';?>
    <div class="wrapper">

        <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Konsumen</h1>
                                <br>
                                <form action = "<?= base_url() ?>KeTambahKonsumen" method = "post">
                                <button type="submit" class="btn btn-primary">Tambah baru</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
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
                                    <form action = "<?= base_url() ?>CariKonsumen" method = "post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" name="nama" placeholder="Nama Konsumen">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Konsumen">
                                            </div>
                                            <div class="form-group">
                                                <label for="nomorTel">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="nohp" placeholder="Nomor Telepon">
                                            </div>
                                            
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id Pelanggan</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Alamat Pelanggan</th>
                                                    <th>Nomor Telepon Pelanggan</th>
                                                    <th colspan="2">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($karyawan as $d): ?>
                                                    <tr>
                                                        <td><?php echo $d['id_konsumen']; ?></td>
                                                        <td><?php echo $d['nama_konsumen']; ?></td>
                                                        <td><?php echo $d['alamat_konsumen']; ?></td>
                                                        <td><?php echo $d['no_telp_konsumen']; ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <div class="col-sm-6">
                                                                    <form action="<?= base_url() ?>HapusKonsumen" method="post">
                                                                        <input type="submit" class="btn btn-info pull-left" value = "Hapus" style="">
                                                                        <input type="hidden" name="id" value="<?= $d['id_konsumen']; ?>">
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <form action="<?= base_url() ?>KeUpdateKonsumen" method="post">
                                                                        <input type="submit" class="btn btn-info pull-left" value = "Update" style="">
                                                                        <input type="hidden" name="id" value="<?= $d['id_konsumen']; ?>">
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
            </center>
        </div>

        <!-- <footer class="main-footer">

        </footer> -->
        <!-- <div class="control-sidebar-bg"></div> -->
    </div>

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
        $(document).ready(function () {
            $('.sidebar-menu').tree()
        })

        $(function () {
            $('#edTanggal').datepicker();
        });
    </script>
</body>
</html>
