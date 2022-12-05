@extends('layout')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark mb-0">Selamat Datang, @if (!Auth::guest())
                        {{ Auth::user()->name }}
                    @endif
                </h3>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-6 mb-4">
                    <div class="card shadow border-start-primary py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                                        <script>
                                            var today = new Date();
                                            var dd = String(today.getDate()).padStart(2, '0');
                                            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                                            var yyyy = today.getFullYear();

                                            today = dd + '-' + mm + '-' + yyyy;
                                        </script>
                                        <div>Pendapatan (
                                            <script>
                                                document.write(today)
                                            </script>)
                                        </div>
                                    </div>
                                    <div class="text-dark fw-bold h5 mb-0"><span></span>
                                        <div>Rp. </div>
                                    </div>
                                </div>
                                <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-6 mb-4">
                    <div class="card shadow border-start-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>
                                            <script>
                                                const month = ["Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
                                                    "November", "Desember"
                                                ];
                                                const d = new Date();
                                                let name = month[d.getMonth()];
                                            </script>

                                            <div>Pendapatan (
                                                <script>
                                                    document.write(name)
                                                </script>)
                                            </div>
                                        </span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span>
                                            <div>Rp. </div>
                                        </span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Start: Chart -->
            <div class="row">
                <div class="col-lg-7 col-xl-8">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary fw-bold m-0">Stok Barang</h6><a class="btn btn-link btn-sm"
                                role="button" href="/barang"><i class="fas fa-external-link-alt"></i></a>
                        </div>
                        <div class="container-fluid" style="padding-top: 10px;padding-right: 10px;padding-left: 10px;">
                            <div class="input-group" style="margin-top: 3px;margin-bottom: 5px;"><input class="form-control"
                                    type="text" id="cari-barang" autocomplete="on" placeholder="Cari Barang..."
                                    wire:model="cariBarang">
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary m-0 fw-bold">PENDAPATAN (2022)</h6>
                        </div>
                        <div class="card-body">
                            <!-- Start: Bar Chart -->
                            <div class="chart-area"><canvas
                                    data-bss-chart="{&quot;type&quot;:&quot;bar&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Januari&quot;,&quot;Februari&quot;,&quot;Maret&quot;,&quot;April&quot;,&quot;Mei&quot;,&quot;Juni&quot;,&quot;Juli&quot;,&quot;Agustus&quot;,&quot;September&quot;,&quot;Oktober&quot;,&quot;November&quot;,&quot;Desember&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:&quot;#4e73df&quot;,&quot;borderColor&quot;:&quot;#4e73df&quot;,&quot;data&quot;:[&quot;12.300&quot;,&quot;25&quot;,&quot;32.126&quot;,&quot;50.625&quot;,&quot;40.210&quot;,&quot;31&quot;,&quot;34&quot;,&quot;22&quot;,&quot;33&quot;,&quot;25&quot;,&quot;42&quot;,&quot;100&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;position&quot;:&quot;left&quot;},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;bold&quot;,&quot;display&quot;:true,&quot;text&quot;:&quot;Dalam juta Rupiah&quot;,&quot;position&quot;:&quot;top&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:true,&quot;drawTicks&quot;:false,&quot;drawOnChartArea&quot;:true},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;beginAtZero&quot;:false,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:true,&quot;drawTicks&quot;:false,&quot;drawOnChartArea&quot;:true},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;beginAtZero&quot;:false,&quot;padding&quot;:20}}]}}}"></canvas>
                            </div><!-- End: Bar Chart -->
                        </div>
                    </div><!-- End: Basic Card -->
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                                <script>
                                    var today = new Date();
                                    var dd = String(today.getDate()).padStart(2, '0');
                                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                                    var yyyy = today.getFullYear();

                                    today = dd + '-' + mm + '-' + yyyy;
                                </script>
                                <div>Transaksi (
                                    <script>
                                        document.write(today)
                                    </script>)
                                </div>
                            </div><a class="btn btn-link btn-sm" role="button" href="transaksiPembelian.html"><i
                                    class="fas fa-external-link-alt"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas
                                    data-bss-chart="{&quot;type&quot;:&quot;pie&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Penjualan&quot;,&quot;Pembelian&quot;,&quot;Retur Beli&quot;,&quot;Retur Jual&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;,&quot;rgb(89,89,89)&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;237&quot;,&quot;37&quot;,&quot;7&quot;,&quot;10&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas>
                            </div>
                            <div class="text-center small mt-4"><span class="me-2"><i
                                        class="fas fa-circle text-primary"></i>&nbsp;Penjualan</span><span class="me-2"><i
                                        class="fas fa-circle text-success"></i>&nbsp;
                                    Pembelian</span><span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Retur
                                    Pembelian</span><span><i class="fas fa-circle"
                                        style="font-size: 15px;color: #858796;"></i>&nbsp;
                                    Retur Penjualan</span></div>
                        </div>
                    </div>
                </div>
            </div><!-- End: Chart -->
        </div>
    </div>
@endsection
