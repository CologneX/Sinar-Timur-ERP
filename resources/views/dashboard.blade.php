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
                                        <div>Pendapatan ({{ date('d-m-Y') }})
                                        </div>
                                    </div>
                                    <div class="text-dark fw-bold h5 mb-0"><span></span>
                                        <div>@money(
                                            DB::table('TRANSAKSI_PENJUALAN')->whereDate('TGL_TRANSJUAL', '=', date('Y-m-d'))->sum('TOTAL_TRANSJUAL'),
                                        )</div>
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

                                            <div>Pendapatan ({{ date('F') }})
                                            </div>
                                        </span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span>
                                            <div>@money(
                                                DB::table('TRANSAKSI_PENJUALAN')->whereMonth('TGL_TRANSJUAL', '=', date('m'))->sum('TOTAL_TRANSJUAL'),
                                            )</div>
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
                    @livewire('controller-dashboard')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary m-0 fw-bold">PENDAPATAN (2022)</h6>
                        </div>
                        <div class="card-body">
                            <!-- Start: Bar Chart -->
                            <div class="chart-area"><canvas
                                    data-bss-chart="{&quot;type&quot;:&quot;bar&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Januari&quot;,&quot;Februari&quot;,&quot;Maret&quot;,&quot;April&quot;,&quot;Mei&quot;,&quot;Juni&quot;,&quot;Juli&quot;,&quot;Agustus&quot;,&quot;September&quot;,&quot;Oktober&quot;,&quot;November&quot;,&quot;Desember&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:&quot;#4e73df&quot;,&quot;borderColor&quot;:&quot;#4e73df&quot;,&quot;data&quot;:[&quot;0&quot;,&quot;0&quot;,&quot;0&quot;,&quot;0&quot;,&quot;0&quot;,&quot;0&quot;,&quot;0&quot;,&quot;0&quot;,&quot;0&quot;,&quot;0&quot;,&quot;0&quot;,&quot;12.500&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;position&quot;:&quot;left&quot;},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;bold&quot;,&quot;display&quot;:true,&quot;text&quot;:&quot;Dalam juta Rupiah&quot;,&quot;position&quot;:&quot;top&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:true,&quot;drawTicks&quot;:false,&quot;drawOnChartArea&quot;:true},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;beginAtZero&quot;:false,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:true,&quot;drawTicks&quot;:false,&quot;drawOnChartArea&quot;:true},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;beginAtZero&quot;:false,&quot;padding&quot;:20}}]}}}"></canvas>
                            </div><!-- End: Bar Chart -->
                        </div>
                    </div><!-- End: Basic Card -->
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                                <div>Transaksi ({{ date('Y') }})
                                </div>
                            </div><a class="btn btn-link btn-sm" role="button" href="transaksiPembelian.html"><i
                                    class="fas fa-external-link-alt"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas
                                    data-bss-chart="{&quot;type&quot;:&quot;pie&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Penjualan&quot;,&quot;Pembelian&quot;,&quot;Retur Beli&quot;,&quot;Retur Jual&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;,&quot;rgb(89,89,89)&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;{{ DB::table('TRANSAKSI_PENJUALAN')->count('URUT_TRANSJUAL') }}&quot;,&quot;{{ DB::table('TRANSAKSI_PEMBELIAN')->count('URUT_TRANSBELI') }}&quot;,&quot;{{ DB::table('RETUR_PEMBELIAN')->count('URUT_RETURBELI') }}&quot;,&quot;{{ DB::table('RETUR_PENJUALAN')->count('URUT_RETURJUAL') }}&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas>
                            </div>
                            <div class="text-center small mt-4"><span class="me-2"><i
                                        class="fas fa-circle text-primary"></i>&nbsp;Penjualan</span><span class="me-2"><i
                                        class="fas fa-circle text-success"></i>&nbsp;
                                    Pembelian</span><span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Retur
                                    Pembelian</span><span><i class="fas fa-circle"
                                        style="font-size: 15px;color: #858796;"></i>&nbsp;
                                    Retur Penjualan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End: Chart -->
        </div>
    </div>
@endsection
