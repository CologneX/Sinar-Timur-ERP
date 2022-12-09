@extends('layout')
@section('content')
    <div id="content">
        <div class="container">
            <h3 class="text-dark mb-4" style="font-weight: bold;">Retur Penjualan</h3><!-- Start: #TabelTransaksi -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-end justify-content-xl-end container-fluid"
                        style="padding-left: 0px;padding-right: 0px;"><button
                            class="btn btn-outline-primary d-flex d-sm-flex align-items-center" type="button"
                            data-bs-target="#tabel-transaksi" data-bs-toggle="offcanvas"><i
                                class="fas fa-plus"></i>&nbsp;Tambah</button></div>
                    @livewire('tabel-retur-jual')
                </div>
            </div><!-- End: #TabelTransaksi -->
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright Sinar Timur Sorong (C) 2022</span></div>
        </div>
        <div></div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" data-bs-toggle="offcanvas" data-bss-tooltip=""
        data-bs-placement="left" title="Tambah Transaksi" href="/transaksiPembelian.html"
        data-bs-target="#tabel-transaksi"><i class="fas fa-plus" style="font-size: 17px;"></i></a>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="filter-returan" data-bs-scroll="true">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Filter Pelanggan</h5><button type="button" class="btn-close text-reset"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Start: Cari Nama -->
            <div class="container-fluid d-lg-flex justify-content-lg-start align-items-lg-center">
                <div data-reflow-type="product-search" data-reflow-show-button="true" data-reflow-button-text="Cari"
                    data-reflow-placeholder="Nama..."></div>
            </div><!-- End: Cari Nama -->
        </div>
        <footer style="margin: 12px;"><button class="btn btn-primary" type="button"
                data-bs-dismiss="offcanvas">Tutup</button></footer>
    </div>
@endsection
