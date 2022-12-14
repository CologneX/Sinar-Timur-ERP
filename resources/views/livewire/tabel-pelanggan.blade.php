<div>
    <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input class="form-control" type="text"
            id="cari-barang" autocomplete="on" placeholder="Cari Pelanggan..." wire:model="cariPelanggan">
    </div>
    <div>
        <x-flash-message />
    </div>
    @error('NAMA_PEL')
        <x-flash-error :message="$message" />
    @enderror
    @error('ALAMAT')
        <x-flash-error :message="$message" />
    @enderror
    @error('NOTELP')
        <x-flash-error :message="$message" />
    @enderror
    <div class="table-responsive" style="overflow: auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pelanggan as $data)
                    <tr>
                        <td>{{ $data->ID_PEL }}</td>
                        <td>{{ $data->NAMA_PEL }}</td>
                        <td>{{ $data->ALAMAT }}</td>
                        <td>{{ $data->NOTELP }}</td>
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
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deletePelangganModal"
                                        class="btn dropdown-item"
                                        wire:click="editPelanggan({{ $data->URUT_PELANGGAN }})">Hapus
                                    </button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updatePelangganModal"
                                        class="btn dropdown-item"
                                        wire:click="editPelanggan({{ $data->URUT_PELANGGAN }})">Edit
                                    </button>
                                </div>
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
        {{ $pelanggan->links() }}
    </div>

    {{-- Modal Hapus --}}
    <div wire:ignore.self class="modal fade" role="dialog" tabindex="-1" id="deletePelangganModal"
        aria-labelledby="deletePelangganModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deletePelangganModal">Hapus&nbsp; Pelanggan</h4><button type="button"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button"
                        data-bs-dismiss="modal">Tidak</button>
                    <button class="btn btn-primary" type="button" wire:click="deletePelanggan">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Edit --}}
    <div wire:ignore.self class="modal fade" role="dialog" tabindex="-1" id="updatePelangganModal"
        aria-labelledby="updatePelangganModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="updatePelangganModal">Edit Pelanggan</h4><button type="button"
                        class="btn-close" data-bs-dismiss="modal" wire:click="resetInput" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updatePelanggan">
                    <div class="modal-body">
                        <div class="input-group" style="margin-bottom: 10px;"><span
                                class="d-lg-flex justify-content-lg-end input-group-text" style="width: 130px;">ID
                                Pelanggan</span><input class="form-control" type="text" wire:model="ID_PEL" readonly>
                        </div>
                        <div class="input-group" style="margin-bottom: 10px;"><span
                                class="d-lg-flex justify-content-lg-end input-group-text" style="width: 130px;">Nama
                            </span><input class="form-control" type="text" wire:model="NAMA_PEL"></div>
                        <div class="input-group" style="margin-bottom: 10px;"><span
                                class="d-lg-flex justify-content-lg-end input-group-text"
                                style="width: 130px;">Alamat</span><input class="form-control" type="text"
                                wire:model="ALAMAT"></div>
                        <div class="input-group" style="margin-bottom: 10px;"><span
                                class="d-lg-flex justify-content-lg-end input-group-text" style="width: 130px;">No
                                Telepon</span><input class="form-control" type="text" wire:model="NOTELP"></div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button class="btn btn-light" wire:click="resetInput" type="button"
                        data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit" wire:click="updatePelanggan">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" role="dialog" tabindex="-1" id="tambah-pelanggan">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pelanggan</h4><button type="button" wire:click="resetInput"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Start: Nama Barang -->
                    <div class="container-fluid">
                        <div class="input-group" style="margin-bottom: 15px;"><span
                                class="d-lg-flex justify-content-end justify-content-lg-end input-group-text"
                                style="width: 100px;">Nama</span><input class="form-control" type="text"
                                id="input-nama-pelanggan" required="" wire:model="NAMA_PEL">
                        </div>
                        <div class="input-group" style="margin-bottom: 15px;"><span
                                class="d-lg-flex justify-content-end justify-content-lg-end input-group-text"
                                style="width: 100px;">No Telp</span><input class="form-control" type="text"
                                id="input-notelp-pelanggan" required="" wire:model="NOTELP"></div>
                        <div class="input-group" style="margin-bottom: 15px;"><span
                                class="d-lg-flex justify-content-end justify-content-lg-end input-group-text"
                                style="width: 100px;">Alamat</span>
                            <textarea class="form-control" id="input-alamat-pelanggan" wire:model="ALAMAT"></textarea>
                        </div>
                    </div><!-- End: Nama Barang -->
                </div>
                <div class="modal-footer"><button class="btn btn-primary" type="button"
                        wire:click="tambahPelanggan">Tambah</button></div>
            </div>
        </div>
    </div>
</div>
