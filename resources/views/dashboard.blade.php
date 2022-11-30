@extends('layout')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark mb-0">Halaman Utama</h3>
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
                                        <div>Pendapatan Bruto (
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

                                            <div>Pendapatan Bruto (
                                                <script>
                                                    document.write(name)
                                                </script>)
                                            </div>
                                        </span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span>
                                            <div>Rp. </div>
                                        </span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
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
                                role="button" href="index.html"><i class="fas fa-external-link-alt"></i></a>
                        </div>
                        <div class="container-fluid" style="padding-top: 10px;padding-right: 10px;padding-left: 10px;">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Contoh</td>
                                            <td>PCS</td>
                                            <td>1</td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-md-flex"
                            style="background: #f8f9fc;border-top: 0.3px solid var(--bs-border-color);margin: 8px;margin-top: 0px;">
                            <div class="input-group"><input class="form-control" type="text" id="cari-barang-index"
                                    autocomplete="on" placeholder="Cari Barang..."><button class="btn btn-primary"
                                    type="button">Cari</button></div>
                        </div>
                    </div>
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
                                    data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Direct&quot;,&quot;Social&quot;,&quot;Referral&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;50&quot;,&quot;30&quot;,&quot;15&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas>
                            </div>
                            <div class="text-center small mt-4"><span class="me-2"><i
                                        class="fas fa-circle text-primary"></i>&nbsp;Direct</span><span class="me-2"><i
                                        class="fas fa-circle text-success"></i>&nbsp;Social</span><span class="me-2"><i
                                        class="fas fa-circle text-info"></i>&nbsp;Refferal</span></div>
                        </div>
                    </div>
                </div>
            </div><!-- End: Chart -->
        </div>
    </div>
@endsection
