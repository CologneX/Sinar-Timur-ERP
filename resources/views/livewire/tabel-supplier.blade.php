<div>
    <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input class="form-control" type="text"
            id="cari-barang" autocomplete="on" placeholder="Cari Supplier..." wire:model="cariSupplier">
    </div>
    <div>
        <x-flash-message />
    </div>
    <div class="table-responsive" style="overflow: auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($supplier as $data)
                    <tr>
                        <td>{{ $data->ID_SUP }}</td>
                        <td>{{ $data->NAMA_SUP }}</td>
                        <td>{{ $data->ALAMAT_SUP }}</td>
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
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteSupplierModal"
                                        class="btn dropdown-item" wire:click="editSupplier({{ $data->URUT_SUPPLIER }})"
                                        href="">Hapus
                                    </button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateSupplierModal"
                                        class="btn dropdown-item" wire:click="editSupplier({{ $data->URUT_SUPPLIER }})"
                                        href="">Edit
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $supplier->links() }}
    </div>

    {{-- Modal Hapus --}}

    <div wire:ignore.self class="modal fade" role="dialog" tabindex="-1" id="deleteSupplierModal"
        aria-labelledby="deleteSupplierModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteSupplierModal">Hapus&nbsp; Supplier</h4><button type="button"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button"
                        data-bs-dismiss="modal">Tidak</button>
                    <button class="btn btn-primary" type="button" wire:click="deleteSupplier">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}

    <div wire:ignore.self class="modal fade" role="dialog" tabindex="-1" id="updateSupplierModal"
        aria-labelledby="updateSupplierModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="updateSupplierModal">Edit Pelanggan</h4><button type="button"
                        class="btn-close" data-bs-dismiss="modal" wire:click="clearModal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updateSupplier">
                    <div class="modal-body">
                        <div class="input-group" style="margin-bottom: 10px;"><span
                                class="d-lg-flex justify-content-lg-end input-group-text" style="width: 130px;">ID
                                Supplier</span><input class="form-control" type="text" wire:model="ID_SUP" readonly>
                        </div>
                        <div class="input-group" style="margin-bottom: 10px;"><span
                                class="d-lg-flex justify-content-lg-end input-group-text" style="width: 130px;">Nama
                                Supplier</span><input class="form-control" type="text" wire:model="NAMA_SUP"></div>
                        <div class="input-group" style="margin-bottom: 10px;"><span
                                class="d-lg-flex justify-content-lg-end input-group-text"
                                style="width: 130px;">Alamat</span><input class="form-control" type="text"
                                wire:model="ALAMAT_SUP">
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button class="btn btn-light" wire:click="clearModal" type="button"
                        data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit" wire:click="updateSupplier">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal" role="dialog" tabindex="-1" id="tambahSupplier">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Supplier</h4><button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Start: Nama Barang -->
                    <div class="container-fluid">


                        <div class="input-group" style="margin-bottom: 15px;"><span
                                class="input-group-text">Nama</span><input class="form-control" type="text"
                                wire:model="NAMA_SUP">
                        </div>
                        @error('NAMA_SUP')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="input-group" style="margin-bottom: 15px;"><span
                                class="input-group-text">Alamat</span><input class="form-control" type="text"
                                wire:model="ALAMAT_SUP">
                        </div>
                        @error('ALAMAT_SUP')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="modal-footer"><button class="btn btn-primary" type="submit"
                                wire:click="simpanSupplier">Tambah</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
