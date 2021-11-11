<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cari Pegawai</title>
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
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
    <?php include 'application/views/header.php'; ?>
    <?php include 'application/views/sidebar.php';?>
    <div class="wrapper">
        <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Pegawai</h1>
                                <br>
                                <form action = "<?= base_url() ?>KeTambahPegawai" method = "post">
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
                                    <form action = "<?= base_url() ?>CariPegawai" method = "post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" name="nama" placeholder="Nama Karyawan">
                                            </div>
                                            <div class="form-group">
                                                <label for="posisi">Posisi</label>
                                                <select name="posisi" class="form-control">
                                                    <option value="Pegawai">Pegawai</option>
                                                    <option value="Admin">Admin</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Karyawan">
                                            </div>
                                            <div class="form-group">
                                                <label for="nomorTel">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="nohp" placeholder="Nomor Telepon">
                                            </div>
                                            <div class="form-group">
                                                <label for="jenisKel">Jenis Kelamin: </label>
                                                <input type="radio" name="jk" value="Laki-laki"> Laki-laki
                                                <input type="radio" name="jk" value="Perempuan"> Perempuan<br>
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
                                            <tr>
                                                <th>Id Karyawan</th>
                                                <th>Nama Karyawan</th>
                                                <th>Posisi Karyawan</th>
                                                <th>Alamat Karyawan</th>
                                                <th>Nomor Telepon Karyawan</th>
                                                <th>Jenis Kelamin Karyawan</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                            <?php foreach($karyawan as $d): ?>
                                                <tr>
                                                    <td><?php echo $d['id_karyawan']; ?></td>
                                                    <td><?php echo $d['nama_karyawan']; ?></td>
                                                    <td><?php echo $d['jabatan_karyawan']; ?></td>
                                                    <td><?php echo $d['alamat_karyawan']; ?></td>
                                                    <td><?php echo $d['no_telp_karyawan']; ?></td>
                                                    <td><?php echo $d['jk_karyawan']; ?></td>
                                                    <td>
                                                        <form action="<?= base_url() ?>HapusPegawai" method="post">
                                                            <input type="submit" class="btn btn-info pull-left" value = "Hapus" style="">
                                                            <input type="hidden" name="id" value="<?= $d['id_karyawan']; ?>">
                                                        </form>
                                                    </td>
                                                    <form action="<?= base_url() ?>KeUpdatePegawai" method="post">
                                                        <td>
                                                            <input type="submit" class="btn btn-info pull-left" value = "Update" style="">
                                                            <input type="hidden" name="id" value="<?= $d['id_karyawan']; ?>">
                                                        </td>
                                                    </form>
                                                </tr>
                                            <?php endforeach; ?>
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
