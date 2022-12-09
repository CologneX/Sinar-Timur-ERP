<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SINAR TIMUR</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/tombolHapus.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <div id="wrapper">
        <!-- Start: Sidebar -->
        <nav class="navbar navbar-dark align-items-start navbar sidebar sidebar-dark accordion bg-gradient-primary p-0"
            id="navbar">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>SINAR TIMUR</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a
                            class="nav-link {{ request()->route()->named('dashboard')? 'active': '' }}"
                            href="/dashboard"><i class="fas fa-tachometer-alt"></i><span>&nbsp;Utama</span></a></li>
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        <p class="mb-0" style="color: #ffffff;">Transaksi</p>
                    </div>
                    <li class="nav-item"><a class="nav-link {{ request()->route()->named('nota')? 'active': '' }}"
                            href="/nota"><i class="fas fa-sticky-note"></i><span>&nbsp;Nota</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item">
                        <div><a class="btn btn-link nav-link {{ request()->route()->named('transaksiJual') ||request()->route()->named('transaksiBeli')? 'active': '' }}"
                                data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-1"
                                href="#collapse-1" role="button"><i
                                    class="fas fa-money-bill-wave"></i>&nbsp;<span>Transaksi</span></a>
                            <div class="collapse" id="collapse-1">
                                <div class="bg-white border rounded py-2 collapse-inner">
                                    <h6 class="collapse-header">transaksi toko</h6><a class="collapse-item"
                                        href="/transaksiPenjualan">Penjualan</a><a class="collapse-item"
                                        href="/transaksiPembelian">Pembelian</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div><a class="btn btn-link nav-link {{ request()->route()->named('returJual') ||request()->route()->named('returBeli')? 'active': '' }}"
                                data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-3"
                                href="#collapse-3" role="button"><i
                                    class="fas fa-backspace"></i>&nbsp;<span>Retur</span></a>
                            <div class="collapse" id="collapse-3">
                                <div class="bg-white border rounded py-2 collapse-inner">
                                    <h6 class="collapse-header">Returan toko</h6><a class="collapse-item"
                                        href="/returanPenjualan">Penjualan</a><a class="collapse-item"
                                        href="/returanPembelian">Pembelian</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"></li>
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        <p class="mb-0" style="color: var(--bs-accordion-bg);">DAFTAR</p>
                    </div>
                    <li class="nav-item"></li>
                    <li class="nav-item">
                        <div><a class="btn btn-link nav-link {{ request()->route()->named('supplier') ||request()->route()->named('pelanggan')? 'active': '' }}"
                                data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-2"
                                href="#collapse-2" role="button"><i class="fas fa-users"></i>&nbsp;<span>Supplier &amp;
                                    Pelanggan</span></a>
                            <div class="collapse" id="collapse-2">
                                <div class="bg-white border rounded py-2 collapse-inner">
                                    <h6 class="collapse-header">SUpplier &amp; pelanggan</h6><a class="collapse-item"
                                        href="/pelanggan">Pelanggan</a><a class="collapse-item"
                                        href="/supplier">Supplier</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link {{ request()->route()->named('barang')? 'active': '' }}"
                            href="/barang"><i class="fas fa-table"></i><span>&nbsp;Barang</span></a></li>
                    <hr class="sidebar-divider">
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav><!-- End: Sidebar -->
        <div class="d-flex flex-column" id="content-wrapper">
            <!-- Start: Navbar White -->
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                        id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><span
                        style="font-weight: bold;" id="time"></span>
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                aria-expanded="false" data-bs-toggle="dropdown" href="#"></a>
                            <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="me-auto navbar-search w-100">
                                    <div class="input-group"><input class="bg-light form-control border-0 small"
                                            type="text" placeholder="Search for ...">
                                        <div class="input-group-append"><button class="btn btn-primary py-0"
                                                type="button"><i class="fas fa-search"></i></button></div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                    aria-expanded="false" data-bs-toggle="dropdown"><span
                                        class="d-lg-inline me-2 text-gray-600 small">
                                        @if (!Auth::guest())
                                            {{ Auth::user()->name }}
                                        @endif
                                    </span></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                        class="dropdown-item" href="#"><i
                                            class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a
                                        class="dropdown-item" href="/login"><i
                                            class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Login</a><a
                                        class="dropdown-item" href="/register"><i
                                            class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Register</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="/logout"><i
                                            class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Keluar</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')
        </div>



        <a class="border rounded d-inline scroll-to-top" data-bss-tooltip="" data-bs-placement="left"
            title="Tambah Transaksi" href="/nota">
            <i class="fas fa-plus" style="font-size: 17px;">
            </i>
        </a>
        {{-- <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright Sinar Timur Sorong (C) 2022</span></div>
            </div>
        </footer> --}}
    </div>



    <x-flash-message />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    {{-- <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = "wire:click";
            });
        });
    </script> --}}
    @livewireScripts
</body>

</html>
