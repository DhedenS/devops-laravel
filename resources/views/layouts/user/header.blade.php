<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <img src="{{ asset('assets/images/logos/logoapk.png') }}" alt="Logo" style="height: 70px; width: 70px;">
        <div class="logo d-flex align-items-center me-auto me-lg-0">

        </div>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/#beranda') }}" class="nav-link active">Beranda</a></li>
                <li><a href="{{ url('/#about') }}" class="nav-link active">Tentang kami</a></li>
                <li><a href="{{ route('user.penjualan_padi.penjualanpadi') }}" class="nav-link">Penjualan Padi</a></li>

                <li class="dropdown">
                    <a href="#"><span>Produk</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user.produk.kategori', 'beras') }}" class="dropdown-item">Beras</a></li>
                        <li><a href="{{ route('user.produk.kategori', 'pupuk') }}" class="dropdown-item">Pupuk</a></li>
                        <li><a href="{{ route('user.produk.kategori', 'obat') }}" class="dropdown-item">Obat-obatan</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('layanan/alat_bajak') }}" class="dropdown-item">Alat Bajak</a></li>
                        <li><a href="{{ url('layanan/alat_panen') }}" class="dropdown-item">Alat Panen</a></li>
                        <li><a href="{{ url('layanan/tenagatanam') }}" class="dropdown-item">Tenaga Tanam</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/#berita') }}">Berita Tani</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#harga') }}">Harga Padi</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#tips') }}">Tips Bertani</a></li>
                    </ul>
                </li>

                <li><a href="{{ url('/#kontak') }}" class="nav-link">Kontak</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        {{-- Login Button (Guest) / Profile Dropdown (Auth) --}}
        @if (Auth::check())
            <div class="dropdown">
                <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                    @if (Auth::user()->logo)
                        <img src="{{ asset('storage/' . Auth::user()->logo) }}" alt="Profile" class="rounded-circle"
                            width="55" height="55">
                    @else
                        <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="Profile Default"
                            class="rounded-circle" width="32" height="32">
                    @endif

                    <span class="ms-2">{{ Auth::user()->nama_lengkap ?? Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    @if (Auth::user()->role === 'admin')
                        <li> <a class="dropdown-item" href="{{ route('dashboard') }}">Admin Page</a></li>
                    @endif
                    <li><a class="dropdown-item" href="{{ route('profile.profil') }}">Profile</a></li>
                    <li>
<<<<<<< HEAD
                        <li>
        {{-- <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('user.notifikasi') }}">
            Notifikasi
            @php
                $unreadCount = Auth::user()->unreadNotifications->count();
            @endphp
            @if ($unreadCount > 0)
                <span class="badge bg-danger rounded-pill ms-2">{{ $unreadCount }}</span>
            @endif
        </a> --}}
    </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
=======
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center"
                            href="{{ route('user.notifikasi') }}">
                            Notifikasi
                            @php
                                $unreadCount = Auth::user()->unreadNotifications->count();
                            @endphp
                            @if ($unreadCount > 0)
                                <span class="badge bg-danger rounded-pill ms-2">{{ $unreadCount }}</span>
                            @endif
                        </a>
                    </li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
>>>>>>> 8ffd3a83c94155c05419011edc99aca36086d19b
                    </li>
                </ul>
            </div>
        @else
            <a class="btn-getstarted" href="{{ url('/register') }}">Get Started</a>
        @endif

    </div>
</header>
