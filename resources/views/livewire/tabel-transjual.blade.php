<div>
    <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input class="form-control" type="text"
            id="cari-barang" autocomplete="on" placeholder="Cari Transaksi Penjualan..." wire:model="caritransjual">
    </div>
    <div class="table-responsive" style="overflow: auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID Jual</th>
                    <th>ID Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Total Transaksi</th>
                    <th>Total Barang</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transjual as $data)
                    <tr>
                        <td>{{ $data->ID_TRANSJUAL }}</td>
                        <td>{{ $data->ID_PEL }}</td>
                        <td>{{ $data->TGL_TRANSJUAL }}</td>
                        <td>{{ $data->TOTAL_TRANSJUAL }}</td>
                        <td>{{ $data->TOTAL_ITEMJUAL }}</td>
                        <td class="flex-grow-0" style="padding: 0px;overflow: visible;">
                            <div class="dropstart"><button class="btn" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="padding-right: 5px;padding-left: 5px;overflow: visible;padding-bottom: 8px;padding-top: 6px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" style="width: 16px;">
                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                    </svg></button>
                                <div class="dropdown-menu dropdown-menu-dark"><a class="dropdown-item" href="">Ubah</a><a class="dropdown-item" href="">Hapus</a></div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $transjual->links() }}
    </div>
</div>
