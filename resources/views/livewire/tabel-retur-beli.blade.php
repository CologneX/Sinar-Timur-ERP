<div>
    {{-- <div class="d-flex justify-content-xl-end container-fluid" style="padding-left: 0px;padding-right: 0px;">
        <button class="btn btn-primary d-flex d-sm-flex align-items-center" type="button"
            data-bs-target="#tabel-transaksi" data-bs-toggle="offcanvas"><i class="fas fa-filter"></i>&nbsp;Filter</button>
    </div> --}}
    <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input class="form-control" type="text"
            id="cari-transaksi-pembelian" autocomplete="on" placeholder="Cari Returan Pembelian..."
            wire:model="carireturbeli">
        {{-- <button class="btn btn-primary" id="btn-cari-barang" type="button">Cari</button>b --}}
    </div>
    <div class="table-responsive" style="overflow: auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID Retur</th>
                    <th>ID Beli</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($returbeli as $data)
                    <tr>
                        <td>{{ $data->ID_RETURBELI }}</td>
                        <td>{{ $data->ID_TRANSBELI }}</td>
                        <td>{{ $data->NAMA_BARANG }}</td>
                        <td>{{ $data->KUANTITAS . ' ' . $data->SATUAN }}</td>
                        <td class="flex-grow-0" style="padding: 0px;overflow: visible;">
                            <div class="dropstart"><button class="btn" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="padding-right: 5px;padding-left: 5px;overflow: visible;padding-bottom: 8px;padding-top: 6px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" style="width: 16px;">
                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                    </svg></button>
                                    <div class="dropdown-menu dropdown-menu-dark"><a class="dropdown-item" href="#">Ubah</a><a class="dropdown-item" href="#">Hapus</a></div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $returbeli->links() }}
    </div>

</div>
