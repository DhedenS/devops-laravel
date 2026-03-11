<aside class="left-sidebar text-dark" id="sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between p-3 mb-3">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="/assets/images/logos/dark-logo.svg" width="200" alt="Logo" />
            </a>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav" class="nav flex-column">
                <li class="nav-small-cap mt-2">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('dashboard') }}"><i
                            class="ti ti-layout-dashboard"></i> Dashboard</a></li>

                            <li class="nav-small-cap mt-2">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Manajemen</span>
      </li>

                <!-- MENU PETANI DENGAN DROPDOWN JENIS PADI -->
                <li class="sidebar-item">
                    <a class="sidebar-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        href="#petaniMenu" role="button" aria-expanded="false">
                        <div>
                            <i class="ti ti-user"></i> Petani
                        </div>
                        <i class="ti ti-chevron-down"></i>
                    </a>
                    <div class="collapse" id="petaniMenu">
                        <ul class="nav flex-column ms-3">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('petani.index') }}">
                                    <i class="ti ti-users"></i> Data Petani
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('padi.index') }}">
                                    <i class="ti ti-leaf"></i> Jenis Padi
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Menu lainnya --}}
                {{-- <li class="sidebar-item"><a class="sidebar-link" href="{{ route('penjualan_padi') }}"><i class="ti ti-shopping-cart"></i> Penjualan Padi</a></li> --}}
                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('produk.index') }}"><i
                            class="ti ti-package"></i> Produk</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('jenis-sewa.index') }}"><i
                            class="ti ti-assembly"></i>Jenis Sewa</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('produksi_beras.index') }}"><i
                            class="ti ti-building"></i> Produksi Beras</a></li>
                {{-- <li class="sidebar-item"><a class="sidebar-link" href="{{ route('hutang') }}"><i class="ti ti-cash"></i> Hutang Petani</a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('penyewaan') }}"><i class="ti ti-tool"></i> Penyewaan</a></li> --}}
                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('pengajuansewa.index') }}"><i
                            class="ti ti-clipboard-text"></i> Pengajuan Sewa</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('pengajuanpadi.index') }}"><i
                            class="ti ti-clipboard-text"></i> Pengajuan Padi</a></li>
                            <li class="sidebar-item">
    <a class="sidebar-link" href="{{ route('laporan.transaksi') }}">
        <i class="ti ti-tool"></i> Detail Transaksi
    </a>
</li>
                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('berita.index') }}"><i
                            class="ti ti-news"></i> Berita</a></li>

                <li class="nav-small-cap mt-2">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Distribusi</span>
                </li>

                {{-- <li class="sidebar-item"><a class="sidebar-link" href="{{ route('pengiriman') }}"><i class="ti ti-truck"></i> Pengiriman</a></li> --}}

                <li class="nav-small-cap mt-2">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Laporan</span>
                </li>

                {{-- <li class="sidebar-item"><a class="sidebar-link" href="{{ route('laporan') }}"><i class="ti ti-report"></i> Laporan</a></li> --}}

                <li class="nav-small-cap mt-2">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Pengaturan</span>
                </li>

                {{-- <li class="sidebar-item"><a class="sidebar-link" href="{{ route('pengaturan') }}"><i class="ti ti-settings"></i> Pengaturan</a></li> --}}

            </ul>
        </nav>
    </div>
</aside>
