<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Supplier</title>
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
            <!-- <div class="row" style="padding-left:20px; padding-right:20px;">
                <div class="row">
                    <div class="col-md-2">
                    <div class="box box-danger">
                        <div class="box-header">
                            <h3 class="box-title">Search</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Status :</label>
                                <div class="radio">
                                    <label><input type="radio" name="edStatus" id="" value="0" onfocus="stopShow()">Belum Dikonfirmasi</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="edStatus" id="" value="1" onfocus="stopShow()">Tidak Disetujui</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="edStatus" id="" value="2" onfocus="stopShow()">Sukses</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal :</label>
                                <input type="text" class="form-control" name="edTanggal" id="edTanggal" onfocus="stopShow()">
                            </div>
                            <div class="form-group">
                                <label>Jenis :</label>
                                <div class="radio">
                                    <label><input type="radio" name="edJenis" id="" value = "Dine" onfocus="stopShow()">Dine In</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="edJenis" id="" value = "T" onfocus="stopShow()">Booking</label>
                                </div>
                            </div>
    
                            <form action="#" method="post">
                                <button type="button" class="btn btn-info pull-right" onclick="startShow()" name="edSearch">Search</button>
                                <button type="submit" class="btn btn-info pull-right" name="edShowAll">Show All</button>
                            </form>
                            <div id="konfTrans"></div>
                            <div id="detailTrans"></div>
                            <div id="konf"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-10">
                        <div id="konfTrans"></div>
                        <div id="detailTrans"></div>
                        <div id="konf"></div>
                        <div id="tes"></div>
                    </div>
                </div>
            </div> -->
            <h2 style="float:left;padding-left:2%;padding-top:3%;">Update Supplier</h3>
                <div class="row" style="margin-left:2%;">
                    <div class="col-md-5-left" style="padding-top:12%;padding-right:65%;padding-left:0%;width:150%;">
                        <div class="box">
                            <div class="box-header">
                                <form action = "<?= base_url() ?>UpdateSupplier" method = "post">
                                <?php foreach($karyawan as $k): ?>
                                    <div class="form-group" style="padding-top:0%;">
                                    <input type="hidden" name="id" value="<?= $k['id_supplier'] ?>">
                                        <input type="text" name = "nama" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Nama Supplier" value="<?= $k['nama_supplier'] ?>">
                                        <br>
                                        <input type="text" name = "alamat" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Alamat Supplier" value="<?= $k['alamat_supplier'] ?>">
                                        <br>
                                        <input type="text" name = "nohp" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:100%;" placeholder="Telepon Supplier" value="<?= $k['no_telp_supplier'] ?>">
                                    </div>
                                    <input type="submit" class="btn btn-info pull-left" value = "Update" style="">
                                <?php endforeach; ?>
                                </form>
                            </div>
                        </div>
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