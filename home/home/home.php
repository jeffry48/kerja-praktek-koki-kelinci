<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../../public/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../public/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../public/adminlte/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="../../public/adminlte/dist/css/skins/_all-skins.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="home.html" class="logo">
                <span class="logo-mini"><img class="img-circle" width = 50px height = 50px></span>
                <span class="logo-lg">
                    <b>Koki Kelinci</b>
                </span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a>Admin</a>
                        </li>
                        <li>
                            <a href="login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a href="home.php">
                            <i class="fa fa-dashboard"></i> <span>Home</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i> <span>Master</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../master/employee/pegawai.php"><i class="fa fa-circle-o"></i> Pegawai</a></li>
                            <li><a href="../../master/supplier/supplier.php"><i class="fa fa-circle-o"></i> Supplier</a></li>
                            <li><a href="../../master/customer/customer.php"><i class="fa fa-circle-o"></i> Konsumen</a></li>
                            <li><a href="../../master/category/kategori.php"><i class="fa fa-circle-o"></i> Kategori</a></li>
                            <li><a href="../../master/product/product.php"><i class="fa fa-circle-o"></i> Produk</a></li>
                        </ul>

                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-th"></i> <span>Transaksi</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../transaksi/pembelian/cari_pembelian.php"><i class="fa fa-circle-o"></i>pembelian</a></li>
                            <li><a href="../../transaksi/penjualan/cari_penjualan.php"><i class="fa fa-circle-o"></i>penjualan</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="../../laporan/home laporan/home_laporan.php">
                            <i class="fa fa-files-o"></i> <span>Laporan</span>
                        </a>
                    </li>
                </ul>

                <div style="position: absolute; bottom: 0; z-index: -1">
                    <!-- <img src="{{ url('/fubuki.png')}}" width=100% height=auto> -->
                    <center>
                        <img src="kokiKelinci.jpg" width=70% height=auto style="margin-bottom: 10%; border-radius: 100%;">
                    </center>
                </div>
            </section>
        </aside>

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
            <center>
                <div class="row">
                    <h3>Welcome,Admin</h3>

                    <!-- <div class="col-md-2" style="margin-left: 20%;">
                        <div class="box">
                            <!-- <div class="box-header">aaaa</div> -->
                        </div>
                    </div> -->
                </div>
            </center>
        </div>

        <!-- <footer class="main-footer">

        </footer> -->
        <!-- <div class="control-sidebar-bg"></div> -->
    </div>

    <script src="../../public/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../public/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../public/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../../public/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script src="../../public/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="../../public/adminlte/dist/js/adminlte.min.js"></script>
    <script src="../../public/adminlte/dist/js/demo.js"></script>

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
