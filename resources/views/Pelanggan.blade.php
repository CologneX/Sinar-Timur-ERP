@extends('layout')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <h2 class="fw-bold text-dark mb-4" style="color: rgb(0,0,0);">Pelanggan</h2><!-- Start: #TabelBarang -->
            <!-- Start: #TabelPelanggan -->
            <div class="card shadow" id="tabel-pelanggan">
                <div class="card-body">
                    <div class="d-flex justify-content-end"><button
                            class="btn btn-outline-primary d-sm-flex justify-content-sm-end align-items-sm-center"
                            type="button" data-bs-toggle="modal" data-bs-target="#tambah-pelanggan"><i
                                class="fas fa-plus"></i>&nbsp;Tambah</button></div>
                    @livewire('tabel-pelanggan')

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



@endsection
