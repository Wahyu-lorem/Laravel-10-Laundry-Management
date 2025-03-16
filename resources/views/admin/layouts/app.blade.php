<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="/dist/assets/img/wattpad.png">
        <link rel="icon" type="image/png" href="/dist/assets/img/wattpad.png">
        <title>
            @yield('title')
        </title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="/dist/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/dist/assets/css/nucleo-svg.css" rel="stylesheet" />
        <link id="pagestyle" href="/dist/assets/css/argon-dashboard.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

    </head>
    <body class="g-sidenav-show bg-gray-100">
        <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('/dist/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
            <span class="mask bg-primary opacity-6"></span>
          </div>
        <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
            <div class="sidenav-header d-flex justify-content-center align-items-center position-relative">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="/admin/home">
                    <img src="/dist/assets/images/logos/logo.png" alt="logo" style="max-width: 90px;">
                </a>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/home') ? 'active' : '' }}" href="/admin/home">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/pakets') ? 'active' : '' }}" href="/admin/pakets">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-box-2 text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Paket</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/kupons') ? 'active' : '' }}" href="/admin/kupons">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tag text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Kupons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/transaksis') ? 'active' : '' }}" href="/admin/transaksis">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-bullet-list-67 text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Transaksi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#laporanExamples" class="nav-link {{ request()->is('admin/transaksis/*') ? 'active' : '' }}" aria-controls="laporanExamples" role="button" aria-expanded="{{ request()->is('admin/transaksis/*') ? 'true' : 'false' }}">
                            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-chart-bar-32 text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/transaksis/*') ? 'show' : '' }}" id="laporanExamples">
                            <ul class="nav ms-4">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('admin/transaksis/laporan') ? 'active' : '' }}" href="/admin/transaksis/laporan">
                                        <span class="sidenav-mini-icon"> T </span>
                                        <span class="sidenav-normal">Laporan Transaksi</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('admin/transaksis/laporanpelanggan') ? 'active' : '' }}" href="/admin/transaksis/laporanpelanggan">
                                        <span class="sidenav-mini-icon"> K </span>
                                        <span class="sidenav-normal">Laporan Pelanggan</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('admin/laporan/kupon') ? 'active' : '' }}" href="{{ route('admin.laporan.kupon') }}">
                                        <span class="sidenav-mini-icon"> K </span>
                                        <span class="sidenav-normal">Laporan Kupon</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/pesans') ? 'active' : '' }}" href="/admin/pesans">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-chat-round text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pesan</span>
                        </a>
                    </li>
                    {{--  <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/transaksis/laporan') ? 'active' : '' }}" href="/admin/transaksis/laporan">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-chart-bar-32 text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan    </span>
                        </a>
                    </li>  --}}

                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#usersExamples" class="nav-link {{ request()->is('users/*') ? 'active' : '' }}" aria-controls="usersExamples" role="button" aria-expanded="false">
                            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Kelolah Users</span>
                        </a>
                        <div class="collapse {{ request()->is('users/*') ? 'show' : '' }}" id="usersExamples">
                            <ul class="nav ms-4">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('users/create') ? 'active' : '' }}" href="/admin/users/create">
                                        <span class="sidenav-mini-icon"> T </span>
                                        <span class="sidenav-normal"> Tambah User </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('admin/karyawan') ? 'active' : '' }}" href="/admin/karyawan">
                                        <span class="sidenav-mini-icon"> K </span>
                                        <span class="sidenav-normal"> Daftar Karyawan </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('admin/pelanggan') ? 'active' : '' }}" href="/admin/pelanggan">
                                        <span class="sidenav-mini-icon"> P </span>
                                        <span class="sidenav-normal"> Daftar Pelanggan </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="main-content position-relative border-radius-lg ">
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">@yield('title')</li>
                        </ol>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <input type="text" id="menuSearch" class="form-control" placeholder="Type here...">
                            </div>
                        </div>
                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                <a href="/admin/users/profile" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                                </a>
                            </li>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid py-4">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </main>
        <div class="fixed-plugin">
            <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                <i class="fa fa-cog py-2"> </i>
            </a>
            <div class="card shadow-lg">
                <div class="card-header pb-0 pt-3 ">
                    <div class="float-start">
                        <h5 class="mt-3 mb-0">Laundry Configurator</h5>
                        <p>See our dashboard options.</p>
                    </div>
                    <div class="float-end mt-4">
                        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                </div>
                <hr class="horizontal dark my-1">
                <div class="card-body pt-sm-3 pt-0 overflow-auto">
                    <div>
                        <h6 class="mb-0">Sidebar Colors</h6>
                    </div>
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors my-2 text-start">
                            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                        </div>
                    </a>
                    <div class="mt-3">
                        <h6 class="mb-0">Sidenav Type</h6>
                        <p class="text-sm">Choose between 2 different sidenav types.</p>
                    </div>
                    <div class="d-flex">
                        <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                        <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
                    </div>
                    <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                    <div class="d-flex my-3">
                        <h6 class="mb-0">Navbar Fixed</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                        </div>
                    </div>
                    <hr class="horizontal dark my-sm-4">
                    <div class="mt-2 mb-5 d-flex">
                        <h6 class="mb-0">Light / Dark</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                        </div>
                    </div>
                    <a class="btn bg-outline-dark w-100" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
        <script src="/dist/assets/js/core/popper.min.js"></script>
        <script src="/dist/assets/js/core/bootstrap.min.js"></script>
        <script src="/dist/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/dist/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="/dist/assets/js/buttons.js"></script>
        <script src="/dist/assets/js/argon-dashboard.min.js"></script>
        <script src="/dist/assets/js/argon-dashboard.js"></script>
        <script src="/dist/assets/js/argon-dashboard.js.map"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('menuSearch');

                searchInput.addEventListener('input', function() {
                    const query = searchInput.value.toLowerCase();
                    const menuItems = document.querySelectorAll('.navbar-nav .nav-item, #sidenav-main .nav-item');

                    menuItems.forEach(function(item) {
                        const text = item.textContent.toLowerCase();
                        if (text.includes(query)) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    </body>
</html>
