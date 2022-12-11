<div>
    {{-- <div class="d-flex justify-content-end justify-content-xl-end container-fluid"
        style="padding-left: 0px;padding-right: 0px;"><button
            class="btn btn-primary d-sm-flex justify-content-sm-end align-items-sm-center" type="button"
            data-bs-target="#tabel-transaksi" data-bs-toggle="offcanvas"><i class="fas fa-filter"></i>&nbsp;Filter</button>
    </div> --}}
    <div class="d-flex justify-content-end justify-content-lg-end justify-content-xl-end container-fluid"
        style="padding-left: 0px;padding-right: 0px;"><button
            class="btn btn-outline-primary d-flex d-sm-flex align-items-center" type="button" data-bs-target="#menu-add"
            data-bs-toggle="modal"><i class="fas fa-plus"></i>&nbsp;Tambah</button></div>
    <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input class="form-control" type="text"
            id="cari-transaksi-penjualan" autocomplete="on" placeholder="Cari Retur Penjualan..."
            wire:model="carireturjual">
        {{-- <button class="btn btn-primary" id="btn-cari-barang-1"
                        type="button">Cari</button> --}}
    </div>
    <div class="table-responsive" style="overflow: auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID Retur</th>
                    <th>ID Penjualan</th>
                    <th>Waktu</th>
                    <th>Kuantitas Retur</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($returJual as $data)
                    <tr>
                        <td>{{ $data->ID_RETURJUAL }}</td>
                        <td>{{ $data->ID_TRANSJUAL }}</td>
                        <td>{{ $data->TANGGALRETURJUAL }}</td>
                        <td>{{ $data->KUANTITAS_RETURJUAL }}</td>
                        <td class="flex-grow-0" style="padding: 0px;overflow: visible;">
                            <div class="dropstart"><button class="btn" aria-expanded="false"
                                    data-bs-toggle="dropdown" type="button"
                                    style="padding-right: 5px;padding-left: 5px;overflow: visible;padding-bottom: 8px;padding-top: 6px;"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-three-dots-vertical"
                                        style="width: 16px;">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z">
                                        </path>
                                    </svg></button>
                                <div class="dropdown-menu dropdown-menu-dark"><a class="dropdown-item"
                                        href="#">Ubah</a><a class="dropdown-item" href="#">Hapus</a></div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $returJual->links() }}
    </div>
    <div wire:ignore class="modal fade" role="dialog" tabindex="-1" id="menu-add">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Retur Pembelian</h4><button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="input-group" style="margin-bottom: 10px;"><span
                                    class="d-lg-flex justify-content-lg-end input-group-text" style="width: 130px;">ID
                                    Pembelian</span><select wire:model="ID_TRANSJUAL" class="selectpicker"
                                    data-live-search="true">
                                    @foreach ($transaksi as $data)
                                        <option value="{{ $data->ID_TRANSJUAL }}">{{ $data->ID_TRANSJUAL }}</option>
                                    @endforeach
                                </select></div>
                        </div>
                        <div class="col">
                            <div class="input-group" style="margin-bottom: 10px;"><span
                                    class="d-lg-flex justify-content-lg-end input-group-text"
                                    style="width: 130px;">Kuantitas</span><input wire:model="KUANTITAS_RETURJUAL"
                                    class="form-control" type="number"></div>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom: 10px;"><span
                            class="d-lg-flex justify-content-lg-end input-group-text"
                            style="width: 130px;">Barang</span>
                        <select wire:model="ID_BARANG" class="selectpicker" data-live-search="true">
                            @foreach ($barang as $data)
                                <option value="{{ $data->ID_BARANG }}">{{ $data->NAMA_BARANG }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button"
                        data-bs-dismiss="modal">Batal</button><button class="btn btn-primary" type="button"
                        wire:click="simpanData">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
