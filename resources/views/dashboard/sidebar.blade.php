<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <!-- Dashboard -->
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Beranda</span>
        </li>


        {{-- Admin --}}
        @if (Auth::user()->id_role == '1')
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>

        <!-- Konten -->
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Konten</span>
        </li>

        <!-- User -->
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('kelas.index') }}" aria-expanded="false">
                <span>
                    <i class="bi bi-journal-bookmark"></i>
                </span>
                <span class="hide-menu">Kelas</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('myclass.index') }}" aria-expanded="false">
                <span>
                    <i class="bi bi-bank"></i>
                </span>
                <span class="hide-menu">Transaksi</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('peserta.index') }}" aria-expanded="false">
                <span>
                    <i class="bi bi-person-lines-fill"></i>
                </span>
                <span class="hide-menu">Peserta</span>
            </a>
        </li>

        <!-- Kerajinan -->
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
                <span>
                    <i class="bi bi-postcard-heart-fill"></i>
                </span>
                <span class="hide-menu">Pengguna</span>
            </a>
        </li>

        {{-- EndUser --}}
        @else
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <!-- User -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('kelas.userIndex') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-journal-bookmark"></i>
                        </span>
                        <span class="hide-menu">Class</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('myclass.userIndex') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-person-lines-fill"></i>
                        </span>
                        <span class="hide-menu">My Class</span>
                    </a>
                </li>            
        @endif
     
        
        {{-- <!-- Kerajinan -->
        <li class="sidebar-item">
            <a class="sidebar-link" href="" aria-expanded="false">
                <span>
                    <i class="bi bi-bounding-box"></i>
                </span>
                <span class="hide-menu">Skill</span>
            </a>
        </li>
        
        <li class="sidebar-item">
            <a class="sidebar-link" href="" aria-expanded="false">
                <span>
                    <i class="bi bi-book-half"></i>
                </span>
                <span class="hide-menu">Pendidikan</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="" aria-expanded="false">
                <span>
                    <i class="bi bi-briefcase-fill"></i>
                </span>
                <span class="hide-menu">Pengalaman</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="" aria-expanded="false">
                <span>
                    <i class="bi bi-bookmarks"></i>
                </span>
                <span class="hide-menu">Project</span>
            </a>
        </li> --}}
    </ul>
</nav>
<!-- End Sidebar navigation -->


{{-- {{ route('dashboard.home') }} --}}