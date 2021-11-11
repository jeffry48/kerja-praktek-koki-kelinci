<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cari Supplier</title>
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
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    
    <?php include 'application/views/header.php'; ?>
    <?php include 'application/views/sidebar.php';?>

    <div class="wrapper">
        <div class="content-wrapper">
            <h2 style="float:left;padding-left:2%;padding-top:3%;">Cari Supplier</h3>
                <div class="row" style="margin-left:2%;">
                    <div class="col-md-5-left" style="padding-top:12%;padding-right:65%;padding-left:0%;width:150%;">
                        <div class="box">
                            <div class="box-header">
                                <form action = "<?= base_url() ?>KeTambahSupplier" method = "post">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-info pull-left" value = "Tambah" style="">
                                    </div>
                                </form>
                                <br>
                                <form action = "<?= base_url() ?>CariSupplier" method = "post">
                                    <div class="form-group" style="padding-top:6%;">
                                        <input type="text" name = "nama" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Nama Supplier">
                                        <br>
                                        <input type="text" name = "alamat" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Alamat Supplier">
                                        <br>
                                        <input type="text" name = "nohp" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Telepon Supplier">
                                    </div>
                                    <input type="submit" class="btn btn-info pull-left" value = "Cari" style="">
                                </form>
                            </div>
                        </div>
                        <table>
                            <tr>
                                <th>Id Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Alamat Supplier</th>
                                <th>Nomor Telepon Supplier</th>
                                <th colspan="2">Action</th>
                            </tr>
                            <?php foreach($karyawan as $d): ?>
                            <tr>
                                <td><?php echo $d['id_supplier']; ?></td>
                                <td><?php echo $d['nama_supplier']; ?></td>
                                <td><?php echo $d['alamat_supplier']; ?></td>
                                <td><?php echo $d['no_telp_supplier']; ?></td>
                                <td>
                                    <form action="<?= base_url() ?>HapusSupplier" method="post">
                                        <input type="submit" class="btn btn-info pull-left" value = "Hapus" style="">
                                        <input type="hidden" name="id" value="<?= $d['id_supplier']; ?>">
                                    </form>
                                </td>
                                <form action="<?= base_url() ?>KeUpdateSupplier" method="post">
                                    <td>
                                        <input type="submit" class="btn btn-info pull-left" value = "Update" style="">
                                        <input type="hidden" name="id" value="<?= $d['id_supplier']; ?>">
                                    </td>
                                </form>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div> 
                </div>
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
            <?php
            if(isset($_SESSION['success'])){
                echo '$("#myModal").modal("show");';
            }
            ?>
        })

        $(function () {
            $('#edTanggal').datepicker();
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
