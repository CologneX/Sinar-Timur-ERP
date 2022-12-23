@extends('layout')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <h2 class="fw-bold text-dark mb-4" style="color: rgb(0,0,0);">Barang</h2><!-- Start: #TabelBarang -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
                        <div class="row g-0 d-flex d-lg-flex justify-content-sm-start align-items-lg-center"
                            style="padding-bottom: 5px;">
                            <div class="col d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-end align-content-center justify-content-sm-end justify-content-md-end justify-content-xl-end"
                                style="padding-left: 12px;">
                                {{-- <button
                                    class="btn btn-outline-primary text-center d-flex justify-content-center align-items-center"
                                    type="button"
                                    style="margin-right: 9px;padding-right: 6px;padding-left: 4px;width: 84px;"
                                    data-bs-target="#tambah-barang" data-bs-toggle="offcanvas"><i
                                        class="fas fa-plus"></i>&nbsp;Barang</button> --}}
                                <div class="d-flex justify-content-end"><button
                                        class="btn btn-outline-primary d-sm-flex justify-content-sm-end align-items-sm-center"
                                        type="button" data-bs-toggle="offcanvas" data-bs-target="#tambah-barang"><i
                                            class="fas fa-plus"></i>&nbsp;Tambah</button></div>
                                {{-- <button
                                    class="btn btn-outline-primary d-flex d-sm-flex justify-content-center align-items-center justify-content-sm-end align-items-sm-center"
                                    type="button" data-bs-target="#filter-barang" data-bs-toggle="offcanvas"
                                    style="width: 84px;"><i class="fas fa-filter"></i>&nbsp;Filter</button> --}}
                            </div>
                        </div>
                    </div>
                    @livewire('tabel-barang')
                </div>
            </div><!-- End: #TabelBarang -->
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright Sinar Timur Sorong (C) 2022</span></div>
        </div>
    </footer>
    <a class="border rounded d-inline scroll-to-top"  data-bss-tooltip="" data-bs-placement="left"
        title="Tambah Transaksi" href="/nota" ><i class="fas fa-plus"
            style="font-size: 17px;">
        </i>
    </a>
@endsection
