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
            @forelse ($nota as $data)
                <tr id="tabel-nota" style="height: 43px;">
                    <td>{{DB::table('BARANG')->where('ID_BARANG', $data->ID_BARANG)->value('NAMA_BARANG')}}</td>
                    <td>{{ $data->KUANTITAS_JUAL }}</td>
                    <td>@money($data->HARGA_JUAL)</td>
                    <td>@money($data->SUBTOTAL_DETAILJUAL)</td>
                    <td class="text-center" style="padding: 0px;">
                        <button class="btn" id="tbl-hapus" type="button"
                            style="padding: 0px;" wire:click="hapusBarang({{DB::table('BARANG')->where('ID_BARANG', $data->ID_BARANG)->value('URUT_BARANG')}})"><svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="-32 0 512 512" width="1em" height="1em"
                                fill="currentColor"
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
                    <td colspan="6" class="text-center">Belum ada barang</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>


