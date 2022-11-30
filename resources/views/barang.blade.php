@extends('layout')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <h3 class="text-dark mb-4" style="color: rgb(0,0,0);">BARANG</h3><!-- Start: #TabelBarang -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
                        <div class="row g-0 d-flex d-lg-flex justify-content-sm-start align-items-lg-center"
                            style="padding-bottom: 5px;">

                            <div class="col d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-end align-content-center justify-content-sm-end justify-content-md-end justify-content-xl-end"
                                style="padding-left: 12px;"><button
                                    class="btn btn-outline-primary text-center d-flex justify-content-center align-items-center"
                                    type="button"
                                    style="margin-right: 9px;padding-right: 6px;padding-left: 4px;width: 84px;"
                                    data-bs-target="#tambah-barang" data-bs-toggle="offcanvas"><i
                                        class="fas fa-plus"></i>&nbsp;Barang</button><button
                                    class="btn btn-outline-primary d-flex d-sm-flex justify-content-center align-items-center justify-content-sm-end align-items-sm-center"
                                    type="button" data-bs-target="#filter-barang" data-bs-toggle="offcanvas"
                                    style="width: 84px;"><i class="fas fa-filter"></i>&nbsp;Filter</button></div>
                        </div>

                    </div>
                    @livewire('tabel-barang')
                </div>
            </div><!-- End: #TabelBarang -->
        </div>
    </div>
    </div><a class="border rounded d-inline scroll-to-top" data-bs-toggle="offcanvas" data-bss-tooltip=""
        data-bs-placement="left" title="Tambah Transaksi" href="/transaksiPembelian.html"
        data-bs-target="#tabel-transaksi"><i class="fas fa-plus" style="font-size: 17px;"></i></a>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="filter-barang" data-bs-scroll="true">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Filter Barang</h5><button type="button" class="btn-close text-reset"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Start: Gudang -->
            <div class="container">
                <p style="font-weight: bold;">Gudang</p>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label
                        class="form-check-label" for="Sorpus">Sorpus</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2"><label
                        class="form-check-label" for="Moyo">Moyo</label></div>
            </div><!-- End: Gudang -->
        </div>
        <footer style="margin: 12px;"><button class="btn btn-primary" type="button"
                data-bs-dismiss="offcanvas">Tutup</button></footer>
    </div>
    <form action="/" method="POST">
        @csrf
        <div class="offcanvas offcanvas-end" tabindex="-1" id="tambah-barang" data-bs-scroll="true">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Tambah Barang</h5><button type="button" class="btn-close text-reset"
                    data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Start: Nama Barang -->
                <div class="container-fluid">
                    <div class="input-group" style="margin-bottom: 15px;"><span class="input-group-text">Nama</span><input
                            class="form-control" type="text" id="input-nama-barang" required="" name="NAMA_BARANG">
                    </div>
                    <div class="input-group" style="margin-bottom: 15px;"><span class="input-group-text">Harga</span><input
                            class="form-control" type="number" id="input-harga-barang" required="" name="HARGA">
                    </div>
                    <div class="input-group" style="margin-bottom: 15px;"><span class="input-group-text">Stok</span><input
                            class="form-control" type="number" id="tambah-stok-barang" required="" name="STOK"><span
                            class="input-group-text">@</span>
                        <select class="form-select" id="SATUAN" name="SATUAN">
                            <option value="PCS" selected="">PCS</option>
                            <option value="KG">KG</option>
                            <option value="LITER">LITER</option>
                            <option value="METER">METER</option>
                        </select>
                    </div>
                    <div class="input-group" style="margin-bottom: 15px;"><span class="input-group-text">Kategori</span>
                        <select class="form-select" id="select-kategori" required="">
                            <option value="1">Alat Bangunan</option>
                            <option value="2">Pertukangan</option>
                            <option value="3">Elektronik</option>
                            <option value="4">Otomotif</option>
                        </select>
                    </div>
                </div><!-- End: Nama Barang -->
                <!-- Start: Gudang -->
                <div class="container" id="gudang">
                    <div class="input-group" style="margin-bottom: 15px;"><span class="input-group-text">Lokasi</span>
                        <select class="form-select" id="select-kategori" required="" name="LOKASI">
                            <option value="Sorpus">Sorpus</option>
                            <option value="Moyo">Moyo</option>
                            <option value="Toko">Toko</option>
                        </select>
                    </div>
                </div><!-- End: Gudang -->
            </div>
            <footer style="margin: 12px;text-align: right;"><button class="btn btn-primary" type="submit"
                    data-bs-dismiss="offcanvas">Tambah</button></footer>
        </div>
    </form>
    {{-- <div class="modal fade" role="dialog" tabindex="-1" id="update-barang">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4><button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Start: Nama Barang -->
                    <div class="container-fluid">
                        <div class="input-group" style="margin-bottom: 5px;"><span
                                class="input-group-text">ID</span><input class="form-control" type="text"
                                id="edit-id-barang" readonly=""></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span
                                class="input-group-text">Nama</span><input class="form-control" type="text"
                                id="edit-nama-barang" required=""></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span
                                class="input-group-text">Harga</span><input class="form-control" type="number"
                                id="edit-harga-barang" required=""></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span
                                class="input-group-text">Stok</span><input class="form-control" type="number"
                                id="edit-stok-barang" required=""><span class="input-group-text">@</span><select
                                class="form-select" id="edit-satuan-barang">
                                <option value="PCS" name="PCS">PCS</option>
                                <option value="KG" name="KG">KG</option>
                                <option value="LITER" name="LITER">LITER</option>
                                <option value="METER" name="METER">METER</option>
                            </select></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span
                                class="input-group-text">Kategori</span><select class="form-select"
                                id="select-kategori-1" required="">
                                <option value="1" name="Alat Bangunan">Alat Bangunan</option>
                                <option value="2" name="Alat Bangunan">Pertukangan</option>
                                <option value="3" name="Alat Bangunan">Elektronik</option>
                                <option value="4" name="Alat Bangunan">Otomotif</option>
                            </select></div>
                    </div><!-- End: Nama Barang -->
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button"
                        data-bs-dismiss="modal">Close</button><button class="btn btn-primary"
                        type="button">Save</button></div>
            </div>
        </div>
    </div> --}}
    
@endsection
