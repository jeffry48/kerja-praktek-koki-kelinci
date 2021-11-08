<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cari Produk</title>
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

        <div class="content-wrapper">
        <h2 style="margin-left: 10%; margin-top: 0%;">Cari Produk</h3>
                <div class="row" style="margin-left:10%;">
                    <div class="col-md-10" style="">
                        <div class="box">
                            <div class="box-header">
                                <form action = "<?= base_url() ?>keTambahProduk" method = "post">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-info pull-left" value = "Tambah">
                                    </div>
                                </form>
                                <br><br><br>
                                <form action = "<?= base_url() ?>CariProduk" method = "post">
                                    <div class="form-group">
                                        <input type="text" name = "keyword" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:75%;" placeholder="Nama Produk">
                                        <br>
                                        <input type="text" name = "hargaStart" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:75%;" placeholder="Harga Produk Mulai">
                                        <br>
                                        <input type="text" name = "hargaEnd" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:75%;" placeholder="Harga Produk Akhir">
                                        <br>
                                        kategori: 
                                        <select name = "kategoriPro" class="form-control" style="border-color: #0d74a3; box-shadow: none;width:75%;" >
                                            <option value="all">All</option>
                                            <?php
                                                for ($i=0; $i < count($_SESSION['dataKategori']); $i++) { 
                                                    $currData=$_SESSION['dataKategori'][$i];
                                                    echo '
                                                        <option value="'.$currData['id_kategori'].'">'.$currData['nama_kategori'].'</option>
                                                    ';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-info pull-left" value = "Cari">
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <table>
                            <tr>
                                <th>Id Produk</th>
                                <th>Nama Produk</th>
                                <th>Kategori Produk</th>
                                <th>Harga Produk</th>
                                <th colspan="2" style="align-items: center;">Action</th>
                            </tr>
                            <?php
                            if (isset($_SESSION['hasilSearchPro'])) {
                                for ($i=0; $i < count($_SESSION['hasilSearchPro']); $i++) { 
                                    $currData=$_SESSION['hasilSearchPro'][$i];
                                    $namaKat="";
                                    for ($j=0; $j < count($_SESSION['dataKategori']); $j++) { 
                                        if($currData['id_kategori']==$_SESSION['dataKategori'][$j]['id_kategori']){
                                            $namaKat=$_SESSION['dataKategori'][$j]['nama_kategori'];
                                        }
                                    }
                                    echo '
                                    <tr>
                                        <td>'.$currData['id_produk'].'</td>
                                        <td>'.$currData['nama_produk'].'</td>
                                        <td>'.$namaKat.'</td>
                                        <td>'.$currData['harga_produk'].'</td>
                                        <td>
                                            <form action="HapusProduk" method="post">
                                                <input type="hidden" name="idPro" value="'.$currData['id_produk'].'">
                                                <input type="submit" class="btn btn-info pull-left" value = "Hapus" >
                                            </form>
                                        </td>
                                        <form action="keUpdateProduk" method="post">
                                            <td>
                                                <input type="hidden" name="idPro" value="'.$currData['id_produk'].'">
                                                <input type="submit" class="btn btn-info pull-left" value = "Update" >
                                            </td>
                                        </form>
                                    </tr>';
                                }
                            }
                            else{
                                for ($i=0; $i < count($_SESSION['dataProduk']); $i++) { 
                                    $currData=$_SESSION['dataProduk'][$i];
                                    $namaKat="";
                                    for ($j=0; $j < count($_SESSION['dataKategori']); $j++) { 
                                        if($currData['id_kategori']==$_SESSION['dataKategori'][$j]['id_kategori']){
                                            $namaKat=$_SESSION['dataKategori'][$j]['nama_kategori'];
                                        }
                                    }
                                    echo '
                                    <tr>
                                        <td>'.$currData['id_produk'].'</td>
                                        <td>'.$currData['nama_produk'].'</td>
                                        <td>'.$namaKat.'</td>
                                        <td>'.$currData['harga_produk'].'</td>
                                        <td>
                                            <form action="HapusProduk" method="post">
                                                <input type="hidden" name="idPro" value="'.$currData['id_produk'].'">
                                                <input type="submit" class="btn btn-info pull-left" value = "Hapus" >
                                            </form>
                                        </td>
                                        <form action="keUpdateProduk" method="post">
                                            <td>
                                                <input type="hidden" name="idPro" value="'.$currData['id_produk'].'">
                                                <input type="submit" class="btn btn-info pull-left" value = "Update" >
                                            </td>
                                        </form>
                                    </tr>';
                                }
                            }
                                
                            ?>
                        </table>
                    </div> 
                </div>
        </div>
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