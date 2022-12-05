@extends('layout')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <h3 class="fw-bold text-dark mb-4" style="color: rgb(0,0,0);">Pelanggan</h3><!-- Start: #TabelBarang -->
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


    <form method="POST" action="/pelanggan">
        @csrf
        {{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="tambah-pelanggan" data-bs-scroll="true">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Tambah Pelanggan</h5><button type="button" class="btn-close text-reset"
                    data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Start: Nama Barang -->
                <div class="container-fluid">
                    <div class="input-group" style="margin-bottom: 15px;"><span class="input-group-text">Nama</span><input
                            class="form-control" type="text" id="input-nama-pelanggan" required="" name="NAMA_PEL">
                    </div>
                    <div class="input-group" style="margin-bottom: 15px;"><span class="input-group-text">No
                            Telp</span><input class="form-control" type="text" id="input-notelp-pelanggan"
                            name="NOTELP"></div>
                    <div class="input-group" style="margin-bottom: 15px;"><span class="input-group-text">Alamat</span>
                        <textarea class="form-control" id="input-alamat-pelanggan" required="" name="ALAMAT"></textarea>
                    </div>
                </div><!-- End: Nama Barang -->
            </div>
            <footer style="margin: 12px;"><button class="btn btn-primary" type="submit"
                    data-bs-dismiss="offcanvas">Tambah</button>
            </footer>
        </div> --}}
        <div class="modal fade" role="dialog" tabindex="-1" id="tambah-pelanggan">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pelanggan</h4><button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Start: Nama Barang -->
                        <div class="container-fluid">
                            <div class="input-group" style="margin-bottom: 15px;"><span
                                    class="d-lg-flex justify-content-end justify-content-lg-end input-group-text"
                                    style="width: 100px;">Nama</span><input class="form-control" type="text"
                                    id="input-nama-pelanggan" required="" name="NAMA_PEL"></div>
                            <div class="input-group" style="margin-bottom: 15px;"><span
                                    class="d-lg-flex justify-content-end justify-content-lg-end input-group-text"
                                    style="width: 100px;">No Telp</span><input class="form-control" type="text"
                                    id="input-notelp-pelanggan" required="" name="NOTELP"></div>
                            <div class="input-group" style="margin-bottom: 15px;"><span
                                    class="d-lg-flex justify-content-end justify-content-lg-end input-group-text"
                                    style="width: 100px;">Alamat</span>
                                <textarea class="form-control" name="ALAMAT" id="input-alamat-pelanggan"></textarea>
                            </div>
                        </div><!-- End: Nama Barang -->
                    </div>
                    <div class="modal-footer"><button class="btn btn-primary" type="submit"
                            data-bs-dismiss="tambahPelanggan">Tambah</button></div>
                </div>
            </div>
        </div>
    </form>
@endsection
