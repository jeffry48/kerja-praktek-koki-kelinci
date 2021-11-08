<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cari Supplier</title>
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

                <!-- <div style="position: absolute; bottom: 0; z-index: -1">
                    <center>
                        <img src="kokiKelinci.jpg" width=70% height=auto style="margin-bottom: 10%; border-radius: 100%;">
                    </center>
                </div> -->

        <div class="content-wrapper">
        <h2 style="margin-left: 10%; margin-top: 0%;">Cari Supplier</h3>
                <div class="row" style="margin-left:10%;">
                    <div class="col-md-10" style="">
                        <div class="box">
                            <div class="box-header">
                                <form action = "<?= base_url() ?>KeTambahSupplier" method = "post">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-info pull-left" value = "Tambah" style="">
                                    </div>
                                </form>
                                <form action = "<?= base_url() ?>CariSupplier" method = "post">
                                    <div class="form-group" style="padding-top:8%;">
                                        <input type="text" name = "nama" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Nama Supplier">
                                        <br>
                                        <input type="text" name = "alamat" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Alamat Supplier">
                                        <br>
                                        <input type="text" name = "telepon" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Telepon Supplier">
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
                                        <input type="submit" class="btn btn-info pull-right" value = "Hapus" style="">
                                        <input type="hidden" name="id" value="<?= $d['id_supplier']; ?>">
                                    </form>
                                </td>
                                <form action="<?= base_url() ?>KeUpdateSupplier" method="post">
                                    <td>
                                        <input type="submit" class="btn btn-info pull-right" value = "Update" style="">
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
