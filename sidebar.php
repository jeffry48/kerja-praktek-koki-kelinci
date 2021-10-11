<?php
    echo 
    '<section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="../home/home.php">
                    <i class="fa fa-dashboard"></i> <span>Home</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i> <span>Master</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../employee/pegawai.php"><i class="fa fa-circle-o"></i> Pegawai</a></li>
                    <li><a href="../supplier/supplier.php"><i class="fa fa-circle-o"></i> Supplier</a></li>
                    <li><a href="../customer/customer.php"><i class="fa fa-circle-o"></i> Konsumen</a></li>
                    <li><a href="../category/kategori.php"><i class="fa fa-circle-o"></i> Kategori</a></li>
                    <li><a href="../product/product.php"><i class="fa fa-circle-o"></i> Produk</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Transaksi</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../pembelian/cari_pembelian.php"><i class="fa fa-circle-o"></i>pembelian</a></li>
                    <li><a href="../penjualan/cari_penjualan.php"><i class="fa fa-circle-o"></i>penjualan</a></li>
                </ul>
            </li>
            <li>
                <a href="../laporan pembelian/laporan_per_supplier.php">
                    <i class="fa fa-files-o"></i> <span>Laporan</span>
                </a>
            </li>
        </ul>
    
        <div style="position: absolute; bottom: 0; z-index: -1">
            <center>
                <img src="kokiKelinci.jpg" width=70% height=auto style="margin-bottom: 10%; border-radius: 100%;">
            </center>
        </div>
    </section>'
?>