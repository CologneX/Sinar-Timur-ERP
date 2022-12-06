<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="text-primary fw-bold m-0">Stok Barang</h6><a class="btn btn-link btn-sm" role="button" href="/barang"><i
                class="fas fa-external-link-alt"></i></a>
    </div>
    <div class="container-fluid" style="padding-top: 10px;padding-right: 10px;padding-left: 10px;">
        <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input class="form-control" type="text"
                id="cari-barang" autocomplete="on" placeholder="Cari Barang..." wire:model="caribarang">
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barang as $data)
                        <tr>
                            <td>{{ $data->ID_BARANG }}</td>
                            <td>{{ $data->NAMA_BARANG }}</td>
                            <td>{{ $data->STOK . ' ' . $data->SATUAN }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $barang->links() }}
        </div>
    </div>
</div><!-- Start: Basic Card -->
