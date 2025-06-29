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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" />
    @livewireStyles
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
                            class="nav-link
                        {{-- {{ request()->route()->named('dashboard')? 'active': '' }} --}}
                        "
                            href="/dashboard"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -32 576 576"
                                width="1em" height="1em" fill="currentColor" style="width: 16px;height: 16px;">
                                <path
                                    d="M511.8 287.6L512.5 447.7C512.6 483.2 483.9 512 448.5 512H128.1C92.75 512 64.09 483.3 64.09 448V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L416 100.7V64C416 46.33 430.3 32 448 32H480C497.7 32 512 46.33 512 64V185L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6L511.8 287.6zM288 288C323.3 288 352 259.3 352 224C352 188.7 323.3 160 288 160C252.7 160 224 188.7 224 224C224 259.3 252.7 288 288 288zM192 416H384C392.8 416 400 408.8 400 400C400 355.8 364.2 320 320 320H256C211.8 320 176 355.8 176 400C176 408.8 183.2 416 192 416z">
                                </path>
                            </svg><span>&nbsp;Utama</span></a></li>
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        <p class="mb-0" style="color: #ffffff;">Transaksi</p>
                    </div>
                    <li class="nav-item"><a
                            class="nav-link
                        {{-- {{ request()->route()->named('nota')? 'active': '' }} --}}
                        "
                            href="/nota"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512"
                                width="1em" height="1em" fill="currentColor" style="width: 16px;height: 16px;">
                                <path
                                    d="M400 32h-352C21.49 32 0 53.49 0 80v352C0 458.5 21.49 480 48 480h245.5c16.97 0 33.25-6.744 45.26-18.75l90.51-90.51C441.3 358.7 448 342.5 448 325.5V80C448 53.49 426.5 32 400 32zM64 96h320l-.001 224H320c-17.67 0-32 14.33-32 32v64H64V96z">
                                </path>
                            </svg><span>&nbsp;Penjualan</span></a><a
                            class="nav-link
                            {{-- {{ request()->route()->named('pembelian')? 'active': '' }} --}}
                            "
                            href="/pembelian"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640"
                                width="1em" height="1em" fill="currentColor"
                                style="font-size: 13px;width: 16px;height: 16px;">
                                <path
                                    d="M96 96C96 60.65 124.7 32 160 32H576C611.3 32 640 60.65 640 96V320C640 355.3 611.3 384 576 384H160C124.7 384 96 355.3 96 320V96zM160 320H224C224 284.7 195.3 256 160 256V320zM160 96V160C195.3 160 224 131.3 224 96H160zM576 256C540.7 256 512 284.7 512 320H576V256zM512 96C512 131.3 540.7 160 576 160V96H512zM368 128C323.8 128 288 163.8 288 208C288 252.2 323.8 288 368 288C412.2 288 448 252.2 448 208C448 163.8 412.2 128 368 128zM48 360C48 399.8 80.24 432 120 432H520C533.3 432 544 442.7 544 456C544 469.3 533.3 480 520 480H120C53.73 480 0 426.3 0 360V120C0 106.7 10.75 96 24 96C37.25 96 48 106.7 48 120V360z">
                                </path>
                            </svg><span>&nbsp;Pembelian</span></a></li>
                    <li class="nav-item">
                        <div><a class="btn btn-link nav-link
                            {{-- {{ request()->route()->named('transaksiJual') ||request()->route()->named('transaksiBeli')? 'active': '' }} --}}
                            "
                                data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-1"
                                href="#collapse-1" role="button"><svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -32 576 576" width="1em" height="1em" fill="currentColor"
                                    style="width: 16px;height: 16px;">
                                    <path
                                        d="M512 64C547.3 64 576 92.65 576 128V384C576 419.3 547.3 448 512 448H64C28.65 448 0 419.3 0 384V128C0 92.65 28.65 64 64 64H512zM128 384C128 348.7 99.35 320 64 320V384H128zM64 192C99.35 192 128 163.3 128 128H64V192zM512 384V320C476.7 320 448 348.7 448 384H512zM512 128H448C448 163.3 476.7 192 512 192V128zM288 352C341 352 384 309 384 256C384 202.1 341 160 288 160C234.1 160 192 202.1 192 256C192 309 234.1 352 288 352z">
                                    </path>
                                </svg>&nbsp;<span>Riwayat</span></a>
                            <div class="collapse" id="collapse-1">
                                <div class="bg-white border rounded py-2 collapse-inner">
                                    <h6 class="collapse-header">Riwayat Transaksi</h6><a class="collapse-item"
                                        href="/transaksiPenjualan">Penjualan</a><a class="collapse-item"
                                        href="/transaksiPembelian">Pembelian</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div><a class="btn btn-link nav-link
                            {{-- {{ request()->route()->named('returJual') ||request()->route()->named('returBeli')? 'active': '' }} --}}
                            "
                                data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-3"
                                href="#collapse-3" role="button"><svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -32 576 576" width="1em" height="1em" fill="currentColor"
                                    style="width: 16px;height: 16px;">
                                    <path
                                        d="M576 384C576 419.3 547.3 448 512 448H205.3C188.3 448 172 441.3 160 429.3L9.372 278.6C3.371 272.6 0 264.5 0 256C0 247.5 3.372 239.4 9.372 233.4L160 82.75C172 70.74 188.3 64 205.3 64H512C547.3 64 576 92.65 576 128V384zM271 208.1L318.1 256L271 303C261.7 312.4 261.7 327.6 271 336.1C280.4 346.3 295.6 346.3 304.1 336.1L352 289.9L399 336.1C408.4 346.3 423.6 346.3 432.1 336.1C442.3 327.6 442.3 312.4 432.1 303L385.9 256L432.1 208.1C442.3 199.6 442.3 184.4 432.1 175C423.6 165.7 408.4 165.7 399 175L352 222.1L304.1 175C295.6 165.7 280.4 165.7 271 175C261.7 184.4 261.7 199.6 271 208.1V208.1z">
                                    </path>
                                </svg>&nbsp;<span>Retur</span></a>
                            <div class="collapse" id="collapse-3">
                                <div class="bg-white border rounded py-2 collapse-inner">
                                    <h6 class="collapse-header">Returan toko</h6><a class="collapse-item"
                                        href="/returanPenjualan">Penjualan</a><a class="collapse-item"
                                        href="/returanPembelian">Pembelian</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        <p class="mb-0" style="color: var(--bs-accordion-bg);">DAFTAR</p>
                    </div>
                    <li class="nav-item">
                        <div><a class="btn btn-link nav-link
                            {{-- {{ request()->route()->named('supplier') ||request()->route()->named('pelanggan')? 'active': '' }} --}}
                            "
                                data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-2"
                                href="#collapse-2" role="button"><svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor"
                                    style="width: 16px;height: 16px;">
                                    <path
                                        d="M184 88C184 118.9 158.9 144 128 144C97.07 144 72 118.9 72 88C72 57.07 97.07 32 128 32C158.9 32 184 57.07 184 88zM208.4 196.3C178.7 222.7 160 261.2 160 304C160 338.3 171.1 369.8 192 394.5V416C192 433.7 177.7 448 160 448H96C78.33 448 64 433.7 64 416V389.2C26.16 371.2 0 332.7 0 288C0 226.1 50.14 176 112 176H144C167.1 176 190.2 183.5 208.4 196.3V196.3zM64 245.7C54.04 256.9 48 271.8 48 288C48 304.2 54.04 319.1 64 330.3V245.7zM448 416V394.5C468 369.8 480 338.3 480 304C480 261.2 461.3 222.7 431.6 196.3C449.8 183.5 472 176 496 176H528C589.9 176 640 226.1 640 288C640 332.7 613.8 371.2 576 389.2V416C576 433.7 561.7 448 544 448H480C462.3 448 448 433.7 448 416zM576 330.3C585.1 319.1 592 304.2 592 288C592 271.8 585.1 256.9 576 245.7V330.3zM568 88C568 118.9 542.9 144 512 144C481.1 144 456 118.9 456 88C456 57.07 481.1 32 512 32C542.9 32 568 57.07 568 88zM256 96C256 60.65 284.7 32 320 32C355.3 32 384 60.65 384 96C384 131.3 355.3 160 320 160C284.7 160 256 131.3 256 96zM448 304C448 348.7 421.8 387.2 384 405.2V448C384 465.7 369.7 480 352 480H288C270.3 480 256 465.7 256 448V405.2C218.2 387.2 192 348.7 192 304C192 242.1 242.1 192 304 192H336C397.9 192 448 242.1 448 304zM256 346.3V261.7C246 272.9 240 287.8 240 304C240 320.2 246 335.1 256 346.3zM384 261.7V346.3C393.1 335 400 320.2 400 304C400 287.8 393.1 272.9 384 261.7z">
                                    </path>
                                </svg>&nbsp;<span>Supplier &amp; Pelanggan</span></a>
                            <div class="collapse" id="collapse-2">
                                <div class="bg-white border rounded py-2 collapse-inner">
                                    <h6 class="collapse-header">SUpplier &amp; pelanggan</h6><a class="collapse-item"
                                        href="/pelanggan">Pelanggan</a><a class="collapse-item"
                                        href="/supplier">Supplier</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link
                        {{-- {{ request()->route()->named('barang')? 'active': '' }} --}}
                        "
                            href="/barang"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                width="1em" height="1em" fill="currentColor" style="width: 16px;height: 16px;">
                                <path
                                    d="M0 96C0 60.65 28.65 32 64 32H448C483.3 32 512 60.65 512 96V416C512 451.3 483.3 480 448 480H64C28.65 480 0 451.3 0 416V96zM64 160H128V96H64V160zM448 96H192V160H448V96zM64 288H128V224H64V288zM448 224H192V288H448V224zM64 416H128V352H64V416zM448 352H192V416H448V352z">
                                </path>
                            </svg><span>&nbsp;Barang</span></a></li>
                    <hr class="sidebar-divider">
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>

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

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    @livewireScripts
</body>

</html>
