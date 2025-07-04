<div>
    <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input class="form-control" type="text"
            id="cari-barang" autocomplete="on" placeholder="Cari Barang..." wire:model="cariBarang">
    </div>
    <div>
        <x-flash-message />
    </div>
    @error('NAMA_BARANG')
        <x-flash-error :message="$message" />
    @enderror
    @error('HARGA')
        <x-flash-error :message="$message" />
    @enderror
    @error('STOK')
        <x-flash-error :message="$message" />
    @enderror
    @error('LOKASI')
        <x-flash-error :message="$message" />
    @enderror
    @error('SATUAN')
        <x-flash-error :message="$message" />
    @enderror
    <div class="table-responsive" style="overflow: auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Lokasi</th>
                    <th class="text-center"></th>
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
                                <div class="dropdown-menu dropdown-menu-dark">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteBarangModal"
                                        class="dropdown-item" wire:click="editBarang({{ $data->URUT_BARANG }})">Hapus
                                    </button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateBarangModal"
                                        class="dropdown-item" wire:click="editBarang({{ $data->URUT_BARANG }})">Edit
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
        {{ $barang->links() }}
    </div>
    {{-- Modal Hapus --}}
    <div wire:ignore.self class="modal fade" role="dialog" tabindex="-1" id="deleteBarangModal"
        aria-labelledby="deleteBarangModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteBarangModal">Hapus&nbsp; Barang</h4><button type="button"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button"
                        data-bs-dismiss="modal">Tidak</button>
                    <button class="btn btn-primary" type="button" wire:click="deleteBarang">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Edit --}}
    <div wire:ignore.self class="modal fade" role="dialog" tabindex="-1" id="updateBarangModal"
        aria-labelledby="updateBarangModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="updateBarangModal">Edit Barang</h4><button type="button"
                        class="btn-close" data-bs-dismiss="modal" wire:click="resetInput" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="input-group" style="margin-bottom: 10px;">
                        <div class="form-floating"><input class="form-control" id="id-barang" type="text"
                                wire:model="ID_BARANG" placeholder="efsf" readonly>
                            <label for="id-barang">ID Barang</label>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom: 10px;">
                        <div class="form-floating"><input class="form-control" id="harga-brg" type="number"
                                wire:model="HARGA" placeholder="efsf">
                            <label for="harga-brg">Harga Barang</label>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom: 10px;">
                        <div class="form-floating"><input class="form-control" type="text" id="nama"
                                wire:model="NAMA_BARANG" placeholder="efsf">
                            <label for="nama">Nama Barang</label>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom: 10px;">
                        <div class="form-floating"><input class="form-control" id="stok" type="number"
                                wire:model="STOK" placeholder="efsf">
                            <label for="stok">Stok</label>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom: 10px;">
                        <div class="form-floating"><input class="form-control" id="lokasi" type="text"
                                wire:model="LOKASI" placeholder="efsf">
                            <label for="lokasi">Lokasi</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" wire:click="resetInput" type="button"
                        data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit" wire:click="updateBarang">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Tambah --}}
    <div wire:ignore.self class="offcanvas offcanvas-end" tabindex="-1" id="tambah-barang" data-bs-scroll="true">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Tambah Barang</h5><button type="button" wire:click="resetInput"
                class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Start: Nama Barang -->
            <div class="container-fluid">
                <div class="input-group" style="margin-bottom: 15px;">
                    <div class="form-floating"><input class="form-control" type="text" id="input-nama-barang"
                            required="" wire:model="NAMA_BARANG" placeholder="efsf">
                        <label for="input-nama-barang">Nama Barang</label>
                    </div>

                </div>
                <div class="input-group" style="margin-bottom: 15px;">
                    <div class="form-floating"><input class="form-control" type="number" id="input-harga-barang"
                            required="" wire:model="HARGA" placeholder="efsf">
                        <label for="input-harga-barang">Harga</label>

                    </div>
                </div>
                <div class="input-group" style="margin-bottom: 15px;">
                    <div class="form-floating"><input class="form-control" type="number" id="tambah-stok-barang"
                            required="" wire:model="STOK" placeholder="efsf"> <label for="selectbarang">Stok</label>
                    </div>
                    <span class="input-group-text">@</span>
                    <div class="form-floating">
                        <select id="selectbarang"class="form-select" wire:model="SATUAN" placeholder="efsf">
                            <option selected=""></option>
                            <option value="PCS">PCS</option>
                            <option value="KG">KG</option>
                            <option value="LITER">LITER</option>
                            <option value="METER">METER</option>
                        </select>
                        <label for="selectbarang">Satuan</label>
                    </div>
                </div>

                <div class="input-group" style="margin-bottom: 15px;">
                    <div class="form-floating">
                        <input class="form-control" type="text" id="input-lokasi" required=""
                            wire:model="LOKASI" placeholder="efsf">
                        <label for="input-lokasi">Lokasi</label>
                    </div>

                </div>

            </div>
        </div>
        <footer style="margin: 12px;text-align: right;"><button class="btn btn-primary" type="button"
                wire:click="simpanBarang">Tambah</button>
        </footer>
    </div>
</div>
