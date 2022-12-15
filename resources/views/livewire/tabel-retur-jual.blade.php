<div>
    <div>
        <x-flash-message />
    </div>
    @error('KUANTITAS_RETURJUAL')
        <x-flash-error :message="$message" />
    @enderror
    @error('ID_TRANSJUAL')
        <x-flash-error :message="$message" />
    @enderror
    @error('ID_BARANG')
        <x-flash-error :message="$message" />
    @enderror
    <div class="d-flex justify-content-end justify-content-lg-end justify-content-xl-end container-fluid"
        style="padding-left: 0px;padding-right: 0px;"><button
            class="btn btn-outline-primary d-flex d-sm-flex align-items-center" type="button" data-bs-target="#menu-add"
            data-bs-toggle="modal"><i class="fas fa-plus"></i>&nbsp;Tambah</button></div>
    <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input class="form-control" type="text"
            id="cari-transaksi-penjualan" autocomplete="on" placeholder="Cari Retur Penjualan..."
            wire:model="carireturjual">
    </div>
    <div class="table-responsive" style="overflow: auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID Retur</th>
                    <th>ID Penjualan</th>
                    <th>Barang</th>
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
                        <td>{{ DB::table('BARANG')->where('ID_BARANG', $data->ID_BARANG_RETURJUAL)->value('NAMA_BARANG') }}
                        </td>
                        <td>{{ $data->TANGGALRETURJUAL }}</td>
                        <td>{{ $data->KUANTITAS_RETURJUAL }}</td>
                        <td class="justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center justify-content-xxl-center"
                            style="padding: 0px;"><button class="btn btn-link" type="button"
                                style="color: var(--bs-danger);"><svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor"
                                    style="width: 16px;">
                                    <path
                                        d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z">
                                    </path>
                                </svg></button></td>
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
    <form>
        <div wire:ignore class="modal fade" role="dialog" tabindex="-1" id="menu-add">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Retur Penjualan</h4><button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close" wire:click="resetInput"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="input-group" style="margin-bottom: 10px;"><span
                                        class="d-lg-flex justify-content-lg-end input-group-text"
                                        style="width: 130px;">ID
                                        Penjualan</span><select name="ID_TRANSJUAL" wire:model="ID_TRANSJUAL"
                                        class="selectpicker" data-live-search="true" placeholder="Pilih ID Penjualan">

                                        @foreach ($transaksi as $data)
                                            <option value="{{ $data->ID_TRANSJUAL }}">{{ $data->ID_TRANSJUAL }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group" style="margin-bottom: 10px;"><span
                                        class="d-lg-flex justify-content-lg-end input-group-text"
                                        style="width: 130px;">Kuantitas</span><input wire:model="KUANTITAS_RETURJUAL"
                                        class="form-control" type="number">
                                </div>
                            </div>
                        </div>
                        <div class="input-group" style="margin-bottom: 10px;" id="barangBeli"><span
                                class="d-lg-flex justify-content-lg-end input-group-text"
                                style="width: 130px;">Barang</span>
                            <select wire:model="ID_BARANG" name="ID_BARANG" class="selectpicker"
                                data-container="#barangBeli" data-live-search="true" placeholder="Pilih ID Barang">
                                @foreach ($barangBeli as $ID_BARANG)
                                    <option value="{{ $ID_BARANG->ID_BARANG }}">{{ DB::table('BARANG')->where('ID_BARANG',$data->ID_BARANG)->value('NAMA_BARANG') }}</option>
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
    </form>

</div>
