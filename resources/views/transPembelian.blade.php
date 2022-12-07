@extends('layout')
@section('content')
    <div id="content">
        <div class="container">
            <h3 class="text-dark mb-4" style="font-weight: bold;">Transaksi Pembelian</h3><!-- Start: #TabelTransaksi -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-end container-fluid" style="padding-left: 0px;padding-right: 0px;">
                        <button class="btn btn-primary d-sm-flex justify-content-sm-end align-items-sm-center" type="button"
                            data-bs-target="#tabel-transaksi" data-bs-toggle="offcanvas"><i
                                class="fas fa-filter"></i>&nbsp;Filter</button></div>
                    @livewire('tabel-transbeli')
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
    <div class="offcanvas offcanvas-end" tabindex="-1" id="filter-transaksi-pembelian" data-bs-scroll="true">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Filter Transaksi</h5><button type="button" class="btn-close text-reset"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p style="margin-bottom: 11px;margin-top: 8px;">Tanggal Transaksi</p><!-- Start: Tanggal Transaksi -->
            <div class="container-fluid d-md-flex justify-content-md-center justify-content-lg-start align-items-lg-center">
                <ul class="list-inline">
                    <li class="list-inline-item"><input class="d-lg-flex" type="date"></li>
                    <li class="list-inline-item" style="color: rgb(0,0,0);">-</li>
                    <li class="list-inline-item"><input class="d-lg-flex" type="date"></li>
                </ul>
            </div><!-- End: Tanggal Transaksi -->
        </div>
        <footer style="margin: 12px;"><button class="btn btn-primary" id="btn-filter-transaksi" type="button">Cari</button>
        </footer>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="detail-transaksi">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Title</h4><button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>The content of your modal.</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button"
                        data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
