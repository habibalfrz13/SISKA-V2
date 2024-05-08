<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISKA</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('template/dashboard') }}/images/logos/4.svg" />
    <link rel="stylesheet" href="{{ asset('template/dashboard') }}/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- data table  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    {{-- select 2 --}}  
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ url('home') }}" class="text-nowrap logo-img d-flex align-items-center">
                        <img src="{{ asset('template/dashboard') }}/images/logos/4.svg" width="100" alt="" />
                        <h3 style="margin-left: 10px;">SISKAE</h3>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                @include('dashboard.sidebar')
            </div>
            
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <a href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false"
                                class="btn btn-primary" id="drop2">{{ Auth::user()->name }}</a>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('template/dashboard') }}/images/profile/hacker.png"
                                        alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="{{ route('user.profile') }}"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @method('POST')
                                            @csrf
                                            <button class="btn btn-outline-primary mx-3 mt-2 d-block">Keluar</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->

            <div class="container-fluid">
                @include('dashboard.notifikasi')
                @yield('content')
                <div class="px-6 text-center d-flex justify-content-between align-items-center mt-5">
                    <p class="mb-0 fs-4">
                        <a href="https://github.com/habibalfrz13" target="_blank" class="text-primary"><i class="bi bi-github"></i> ALFRZ</a>
                    </p>
                    <p class="mb-0 text-muted">&copy; 2024 ALFRZ.</p>
                </div>
            </div>
            

        </div>
    </div>
    <script src="{{ asset('template/dashboard') }}/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('template/dashboard') }}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/dashboard') }}/js/sidebarmenu.js"></script>
    <script src="{{ asset('template/dashboard') }}/js/app.min.js"></script>
    <script src="{{ asset('template/dashboard') }}/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('template/dashboard') }}/libs/simplebar/dist/simplebar.js"></script>
    <script src="{{ asset('template/dashboard') }}/js/dashboard.js"></script>
    {{-- data table --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
    {{-- select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Pilih Data",
            });
        });
    </script>
</body>

</html>
