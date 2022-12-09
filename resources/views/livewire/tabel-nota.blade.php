<div>
    <div id="content">
        <div class="container-fluid">
            <h3 class="text-dark mb-4" style="font-weight: bold;">NOTA&nbsp;</h3>
        </div><!-- Start: 1 Row 2 Columns -->
        <div class="container">
            <div class="row">
                <div class="col-12 offset-1 offset-sm-0" style="margin-left: 0px;">
                    <!-- Start: #TabelBarang -->
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
                                <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input
                                        class="form-control" type="text" autocomplete="on"
                                        placeholder="Cari Barang..." wire:model="caribarangnota">
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
                                                <td style="padding: 0px;"><input type="number" min="1"
                                                        style="min-width: 25px;max-width: 45px;margin-right: 5px;"><button
                                                        class="btn btn-link" type="button"
                                                        wire:click="pilihBarang({{ $data->URUT_BARANG }})"><svg
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512"
                                                            width="1em" height="1em" fill="currentColor">
                                                            <path
                                                                d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z">
                                                            </path>
                                                        </svg></button></td>
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
                                        value="{{ DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL') }}"></div>
                            </div>
                            @livewire('nota')
                            <div class="row">
                                <div class="col align-items-start align-content-start" style="margin-top: 10px;">
                                    <div>
                                        <div class="input-group"><span class="input-group-text"
                                                style="font-weight: bold;font-size: 13px;">GRAND&nbsp;TOTAL</span><input
                                                class="form-control" type="text" id="grand-total"
                                                style="color: rgb(0,0,0);text-align: right;max-width: 145px;"
                                                value="@money(
                                                    DB::table('DETAIL_TRANSAKSI')->where('ID_TRANSJUAL', DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL'))->sum('SUBTOTAL_DETAILJUAL'),
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
    <a class="border rounded d-inline scroll-to-top" data-bs-toggle="offcanvas" data-bss-tooltip=""
        data-bs-placement="left" title="Tambah Transaksi" href="/transaksiPembelian.html"
        data-bs-target="#tabel-transaksi"><i class="fas fa-plus" style="font-size: 17px;"></i></a>
</div>
