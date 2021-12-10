<?php
    echo '
        <div class="col-md-2">
            <div class="box">
                <a href="'.$this->config->item('backend_server_url').'laporan/laporanPerSupplier">
                    <div class="box-header">Laporan per Supplier</div>
                </a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box">
                <a href="'.$this->config->item('backend_server_url').'laporan/laporanPerCustomer">
                    <div class="box-header">Laporan per Customer</div>
                </a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box">
                <a href="'.$this->config->item('backend_server_url').'laporan/laporanPembelianTerbanyak">
                    <div class="box-header">Laporan Pembelian Terbanyak</div>
                </a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box">
                <a href="'.$this->config->item('backend_server_url').'laporan/laporanPenjualanTerbanyak">
                    <div class="box-header">Laporan Penjualan Terbanyak</div>
                </a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box">
                <a href="'.$this->config->item('backend_server_url').'laporan/laporanMutasiPenjualan">
                    <div class="box-header">Laporan Mutasi Penjualan</div>
                </a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box">
                <a href="'.$this->config->item('backend_server_url').'laporan/laporanMutasiPembelian">
                    <div class="box-header">Laporan Mutasi Pembelian</div>
                </a>
            </div>
        </div>
    ';
?>