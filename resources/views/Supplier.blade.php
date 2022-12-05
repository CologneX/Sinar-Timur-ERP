@extends('layout')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <h3 class="fw-bold text-dark mb-4" style="color: rgb(0,0,0);">Supplier</h3><!-- Start: #TabelBarang -->
            <div class="card shadow" id="tabel-pelanggan-1">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-end"><button
                                class="btn btn-outline-primary d-sm-flex justify-content-sm-end align-items-sm-center" type="button"
                                data-bs-toggle="modal" data-bs-target="#tambahSupplier"><i
                                    class="fas fa-plus"></i>&nbsp;Tambah</button></div>
                        @livewire('tabel-supplier')
                    </div>
                </div>
            </div><!-- End: #TabelPelanggan -->
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright Sinar Timur Sorong (C) 2022</span></div>
        </div>
        <div></div>
    </footer>

    <form method="POST" action="/supplier">
        @csrf
        <div class="modal" role="dialog" tabindex="-1" id="tambahSupplier">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Supplier</h4><button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Start: Nama Barang -->
                        <div class="container-fluid">


                            <div class="input-group" style="margin-bottom: 15px;"><span
                                    class="input-group-text">Nama</span><input class="form-control" type="text"
                                    name="NAMA_SUP">
                            </div>
                            @error('NAMA_SUP')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="input-group" style="margin-bottom: 15px;"><span
                                    class="input-group-text">Alamat</span><input class="form-control" type="text"
                                    name="ALAMAT_SUP">
                            </div>
                            @error('ALAMAT_SUP')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="modal-footer"><button class="btn btn-primary" type="submit">Tambah</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
