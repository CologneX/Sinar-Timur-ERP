@extends('layout')
@section('content')
    <div id="content">
        <div class="container">
            <h2 class="text-dark mb-4" style="font-weight: bold;">Retur Penjualan</h2><!-- Start: #TabelTransaksi -->
            <div class="card shadow">
                <div class="card-body">

                    @livewire('tabel-retur-jual')
                </div>
            </div><!-- End: #TabelTransaksi -->
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright Sinar Timur Sorong (C) 2022</span></div>
        </div>
    </footer>
@endsection
