<div id="content">
    <div class="container-fluid">
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
                    <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input class="form-control"
                            type="text" id="cari-barang" autocomplete="on" placeholder="Cari Barang..."
                            wire:model="cariBarangNota">
                    </div>

                    <div id="content">
                        <div class="container-fluid">
                            <h3 class="text-dark mb-4" style="font-weight: bold;">Nota&nbsp;</h3>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 offset-1 offset-sm-0" style="margin-left: 0px;">
                                    <!-- Start: #TabelBarang -->
                                    <div class="table-responsive" style="overflow: auto;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                    <th>Keterangan</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($barangNota as $data)
                                                    <tr class='clickable-row' data-href='/'>
                                                        <td>{{ $data->ID_BARANG }}</td>
                                                        <td>{{ $data->NAMA_BARANG }}</td>
                                                        <td>{{ 'Rp. ' . $data->HARGA }}</td>
                                                        <td>{{ $data->STOK . ' ' . $data->SATUAN }}</td>
                                                        <td>{{ $data->LOKASI }}</td>
                                                        <td class="flex-grow-0" style="padding: 0px;overflow: visible;">
                                                            <div class="dropstart"><button class="btn"
                                                                    aria-expanded="false" data-bs-toggle="dropdown"
                                                                    type="button"
                                                                    style="padding-right: 5px;padding-left: 5px;overflow: visible;padding-bottom: 8px;padding-top: 6px;"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="1em" height="1em"
                                                                        fill="currentColor" viewBox="0 0 16 16"
                                                                        class="bi bi-three-dots-vertical"
                                                                        style="width: 16px;">
                                                                        <path
                                                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z">
                                                                        </path>
                                                                    </svg></button>
                                                                <div class="dropdown-menu dropdown-menu-dark">
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#deleteBarangModal"
                                                                        class="dropdown-item"
                                                                        wire:click="editBarang({{ $data->ID_BARANG }})">Hapus
                                                                    </button>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#updateBarangModal"
                                                                        class="dropdown-item"
                                                                        wire:click="editBarang({{ $data->ID_BARANG }})">Edit
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak ada data</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $barangNota->links() }}
                                    </div>
                                </div>
                                <div class="col" style="margin-top: 21px;">
                                    <!-- Start: #TabelTransaksi -->
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="input-group input-group-sm" style="margin-bottom: 9px;"><span
                                                    class="input-group-text" style="font-weight: bold;">NO
                                                    NOTA</span><input class="form-control" type="text" id="no-nota"
                                                    readonly=""
                                                    style="color: rgb(0,0,0);max-width: 80px; font-weight: bold; text-align: center;"
                                                    {{-- value="{{ $maxID }}" --}}></div>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Barang</th>
                                                            <th>Barang</th>
                                                            <th>QTY</th>
                                                            <th>Harga</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($barangNota as $data)
                                                            <tr>
                                                                <td>{{ $data->ID_BARANG }}</td>
                                                                <td>{{ $data->NAMA_BARANG }}</td>
                                                                <td>{{ 'Rp. ' . $data->HARGA }}</td>
                                                                <td>{{ $data->STOK . ' ' . $data->SATUAN }}</td>
                                                                <td>{{ $data->LOKASI }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div
                                                class="input-group d-flex d-md-flex d-lg-flex justify-content-end justify-content-sm-end justify-content-md-end justify-content-lg-end">
                                                <span class="input-group-text"
                                                    style="font-weight: bold;font-size: 13px;">GRAND&nbsp;TOTAL</span><input
                                                    class="form-control" type="text" id="grand-total"
                                                    style="color: rgb(0,0,0);text-align: right;max-width: 100px;"
                                                    readonly><button class="btn btn-primary" id="prosesNota"
                                                    type="submit">Proses</button>
                                            </div>
                                        </div>
                                    </div><!-- End: #TabelTransaksi -->
                                    <!-- Start: #TabelTransaksi -->
                                    <div class="card" style="margin-top: 9px;"></div><!-- End: #TabelTransaksi -->
                                </div>
                            </div>
                        </div><!-- End: 1 Row 2 Columns -->
                    </div>
                </div>

                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright Sinar Timur Sorong (C)
                                2022</span></div>
                    </div>
                </footer>
            </div><a class="border rounded d-inline scroll-to-top" data-bs-toggle="offcanvas" data-bss-tooltip=""
                data-bs-placement="left" title="Tambah Transaksi" href="/transaksiPembelian.html"
                data-bs-target="#tabel-transaksi"><i class="fas fa-plus" style="font-size: 17px;"></i>
            </a>

        </div>
    </div>
</div><!-- End: #TabelBarang -->
