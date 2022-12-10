<div>
    {{-- <div class="d-flex justify-content-end justify-content-xl-end container-fluid"
        style="padding-left: 0px;padding-right: 0px;"><button
            class="btn btn-primary d-sm-flex justify-content-sm-end align-items-sm-center" type="button"
            data-bs-target="#tabel-transaksi" data-bs-toggle="offcanvas"><i class="fas fa-filter"></i>&nbsp;Filter</button>
    </div> --}}
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
                        <td>{{ $data->KUANTITAS_RETURJUAL}}</td>
                        <td class="flex-grow-0" style="padding: 0px;overflow: visible;">
                            <div class="dropstart"><button class="btn" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="padding-right: 5px;padding-left: 5px;overflow: visible;padding-bottom: 8px;padding-top: 6px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" style="width: 16px;">
                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                    </svg></button>
                                    <div class="dropdown-menu dropdown-menu-dark"><a class="dropdown-item" href="#">Ubah</a><a class="dropdown-item" href="#">Hapus</a></div>
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
</div>
