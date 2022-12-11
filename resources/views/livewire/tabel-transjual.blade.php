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
                    <th>Waktu</th>
                    <th>Total Transaksi</th>
                    <th>Total Barang</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transjual as $data)
                    <tr>
                        <td>{{ $data->ID_TRANSJUAL }}</td>
                        <td>{{ $data->ID_PEL }}</td>
                        <td>{{ $data->TGL_TRANSJUAL }}</td>
                        <td>@money($data->TOTAL_TRANSJUAL)</td>
                        <td>{{ $data->TOTAL_ITEMJUAL }}</td>
                        <td class="flex-grow-0" style="padding: 0px;overflow: visible;">
                            <div class="dropstart"><button wire:click="detailTransjual({{$data->URUT_TRANSJUAL}})" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#detailTransJualModal" type="button"
                                    style="padding-right: 5px;padding-left: 5px;overflow: visible;padding-bottom: 8px;padding-top: 6px;"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-three-dots-vertical"
                                        style="width: 16px;">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z">
                                        </path>
                                    </svg></button>
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
        {{ $transjual->links() }}
    </div>
    {{-- Modal Detail --}}
    <div wire:ignore.self class="modal fade" role="dialog" tabindex="-1" id="detailTransJualModal"
        aria-labelledby="detailTransJualModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="detailTransJualModal">Detail&nbsp;Penjualan</h4><button type="button"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive" style="overflow: auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tabel as $items)
                                    <tr>
                                        <td>{{ $items->ID_BARANG }}</td>
                                        <td> {{DB::table('BARANG')->where('ID_BARANG',$items->ID_BARANG)->value('NAMA_BARANG')}}</td>
                                        <td>{{ $items->KUANTITAS_JUAL }}</td>
                                        <td>@money($items->HARGA_JUAL)</td>
                                        <td>@money($items->SUBTOTAL_DETAILJUAL)</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="modal-footer"><button class="btn btn-light" type="button"
                                data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
