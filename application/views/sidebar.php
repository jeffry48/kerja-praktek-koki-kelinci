<html>
    <!-- <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="<?= base_url() ?>Home">
                    <i class="fa fa-dashboard"></i> <span>Home</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i> <span>Master</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url() ?>Pegawai"><i class="fa fa-circle-o"></i> Pegawai</a></li>
                    <li><a href="<?= base_url() ?>Supply"><i class="fa fa-circle-o"></i> Supplier</a></li>
                    <li><a href="<?= base_url() ?>Konsumen"><i class="fa fa-circle-o"></i> Konsumen</a></li>
                    <li><a href="<?= base_url() ?>Kategori"><i class="fa fa-circle-o"></i> Kategori</a></li>
                    <li><a href="<?= base_url() ?>Produk"><i class="fa fa-circle-o"></i> Produk</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Transaksi</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url() ?>transaksi/pembelian"><i class="fa fa-circle-o"></i>pembelian</a></li>
                    <li><a href="<?= base_url() ?>transaksi/penjualan"><i class="fa fa-circle-o"></i>penjualan</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url() ?>laporan/laporanPerSupplier">
                    <i class="fa fa-files-o"></i> <span>Laporan</span>
                </a>
            </li>
        </ul>
    
        <div style="position: absolute; bottom: 0; z-index: -1">
            <center>
                <img src="kokiKelinci.jpg" width=70% height=auto style="margin-bottom: 10%; border-radius: 100%;">
            </center>
        </div>
    </section> -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <!-- <img src="./dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
            <span class="brand-text font-weight-light">Koki Kelinci</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?= base_url()?>home" class="nav-link">
                            <i class="fa fa-dashboard"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Master</li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>Pegawai" class="nav-link">
                                    <i class="fa fa-black-tie nav-icon"></i>
                                    <p>Pegawai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url()?>supply" class="nav-link">
                                    <i class="fa fa-truck nav-icon"></i>
                                    <p>Supplier</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>konsumen" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Konsumen</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>kategori" class="nav-link">
                                    <i class="fa fa-check-circle nav-icon"></i>
                                    <p>Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>produk" class="nav-link">
                                    <i class="fa fa-cube nav-icon"></i>
                                    <p>Produk</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Transaksi</li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/transaksi/pembelian" class="nav-link">
                                    <i class="fa fa-shopping-cart nav-icon"></i>
                                    <p>Pembelian</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/transaksi/penjualan" class="nav-link">
                                    <i class="fa fa-sellsy nav-icon"></i>
                                    <p>Penjualan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Laporan</li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <a href="<?= base_url() ?>laporan/laporanPerSupplier" class="nav-link">
                                <i class="fa fa-files-o nav-icon"></i>
                                <p>laporan</p>
                            </a>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</html>