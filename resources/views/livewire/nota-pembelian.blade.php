<div>
    <div id="content">
        <div class="container">
            @error('KUANTITAS_BELI')
                <x-flash-error :message="$message" />
            @enderror
            @error('ID_SUP')
                <x-flash-error :message="$message" />
            @enderror
            <h2 class="text-dark mb-4" style="font-weight: bold;">Pembelian&nbsp;</h2>
            <div class="row">
                <div class="col-12 offset-1 offset-sm-0" style="margin-left: 0px;">
                    <!-- Start: #TabelBarang -->
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
                                <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input
                                        class="form-control" type="text" autocomplete="on"
                                        placeholder="Cari Barang..." wire:model="caribarangnotaBeli">
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Barang</th>
                                            <th>Barang</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Lokasi</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($barang as $data)
                                            <tr>
                                                <td>{{ $data->ID_BARANG }}</td>
                                                <td>{{ $data->NAMA_BARANG }}</td>
                                                <td>@money($data->HARGA)</td>
                                                <td>{{ $data->STOK . ' ' . $data->SATUAN }}</td>
                                                <td>{{ $data->LOKASI }}</td>
                                                <td style="padding: 0px;">
                                                    <button class="btn btn-link" type="button"
                                                        data-bs-target="#qtyBarang" data-bs-toggle="modal"
                                                        wire:click="cariID({{ $data->URUT_BARANG }})"><svg
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512"
                                                            width="1em" height="1em" fill="currentColor">
                                                            <path
                                                                d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z">
                                                            </path>
                                                        </svg></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $barang->links() }}
                            </div>
                        </div>
                    </div><!-- End: #TabelBarang -->
                </div>
                <div class="col" style="margin-top: 21px;">
                    <!-- Start: #TabelTransaksi -->
                    <div class="card shadow">
                        <div class="card-body">
                            <div>
                                <div class="input-group input-group-sm" style="margin-bottom: 9px;"><span
                                        class="input-group-text" style="font-weight: bold;">NO NOTA</span><input
                                        class="form-control" type="text" id="no-nota" readonly=""
                                        style="max-width: 120px;font-weight: bold;text-align: center;"
                                        value="{{ DB::table('TRANSAKSI_PEMBELIAN')->max('ID_TRANSBELI') }}"></div>
                            </div>
                            <div wire:ignore class="input-group">

                                <span class="input-group-text">Supplier </span>
                                <select wire:model="ID_SUP" wire:change="" class="selectpicker" data-live-search="true"
                                    placeholder="Pilih Supplier">
                                    @foreach ($supplier as $data)
                                        <option value="{{ $data->ID_SUP }}">{{ $data->NAMA_SUP }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>QTY</th>
                                            <th>Harga</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($notaBarang as $data)
                                            <tr id="tabel-nota" style="height: 43px;">
                                                <td>{{ DB::table('BARANG')->where('ID_BARANG', $data->ID_BARANG)->value('NAMA_BARANG') }}
                                                </td>
                                                <td>{{ $data->KUANTITAS_BELI }}</td>
                                                <td>@money($data->HARGA_BELI)</td>
                                                <td>@money($data->SUBTOTAL_DETAILBELI)</td>
                                                <td class="text-center" style="padding: 0px;">
                                                    <button class="btn btn-link" id="tbl-hapus" type="button"
                                                        style="padding: 0px;color: #ff0000;"
                                                        wire:click="hapusBarang({{ DB::table('BARANG')->where('ID_BARANG', $data->ID_BARANG)->value('URUT_BARANG') }})"><svg
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512"
                                                            width="1em" height="1em" fill="currentColor"
                                                            style="margin-top: 9px;">
                                                            <path
                                                                d="M400 288h-352c-17.69 0-32-14.32-32-32.01s14.31-31.99 32-31.99h352c17.69 0 32 14.3 32 31.99S417.7 288 400 288z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Nota Kosong</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col align-items-start align-content-start" style="margin-top: 10px;">
                                    <div>
                                        <div class="input-group"><span class="input-group-text"
                                                style="font-weight: bold;font-size: 13px;">GRAND&nbsp;TOTAL</span><input
                                                class="form-control" type="text" id="grand-total"
                                                style="color: rgb(0,0,0);text-align: right;max-width: 145px;"
                                                value="@money(
                                                    DB::table('DETAIL_PEMBELIAN')->where('ID_TRANSBELI', DB::table('TRANSAKSI_PEMBELIAN')->max('ID_TRANSBELI'))->sum('SUBTOTAL_DETAILBELI'),
                                                )">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end" style="margin-top: 10px;"><button
                                    class="btn btn-primary" id="prosesNota" wire:click='nextTransaksi'>Proses</button>
                            </div>
                        </div>
                    </div><!-- End: #TabelTransaksi -->
                </div>
            </div>
        </div><!-- End: 1 Row 2 Columns -->
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright Sinar Timur Sorong (C) 2022</span></div>
        </div>
        <div></div>
    </footer>


    <div wire:ignore.self class="modal fade" role="dialog" tabindex="-1" id="qtyBarang">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="qtyBarang">Barang</h4><button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                <div class="input-group"><span class="d-flex justify-content-end input-group-text"
                                        style="width: 130px;">ID Barang</span><input
                                        class="border rounded form-control" type="text" wire:model="ID_BARANG"
                                        readonly></div>
                            </div>
                            <div class="col">
                                <div class="input-group"><span class="d-flex justify-content-end input-group-text"
                                        style="width: 130px;">Stok</span><input class="border rounded form-control"
                                        type="number" wire:model="STOK" readonly></div>
                            </div>
                        </div>
                        <div>
                            <div class="input-group" style="margin-top: 10px;"><span
                                    class="d-flex justify-content-end input-group-text" style="width: 130px;">Nama
                                    Barang</span>
                                <textarea class="form-control" wire:model="NAMA_BARANG" readonly></textarea>
                            </div>
                            <div class="input-group" style="margin-top: 10px;"><span
                                    class="d-flex justify-content-end input-group-text"
                                    style="width: 130px;">Kuantitas</span><input class="form-control" type="number"
                                    wire:model="KUANTITAS_BELI">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button"
                        data-bs-dismiss="modal">Tutup</button><button class="btn btn-primary" type="button"
                        wire:click="pilihBarang">Masukkan</button></div>
            </div>
        </div>
    </div>
</div>
