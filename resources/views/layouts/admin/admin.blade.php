<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}

    @stack('styles')
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Include -->
        @include('layouts/admin/.sidebar')

        <!-- Main wrapper -->
        <div class="body-wrapper" id="content">
            <!-- Header Start -->
            <header class="app-header p-3 bg-light shadow-sm d-flex justify-content-between align-items-center">
                <button class="btn btn-outline-secondary" id="sidebarCollapse">☰</button>

                <div class="d-flex align-items-center gap-3">
                    <!-- Include Notifikasi -->
                    @include('layouts/admin/.notifikasi')

                    <!-- Profil Admin -->
                    @include('layouts/admin/.profil')
            </header>
            <!-- Header End -->

            <div class="container-fluid p-4 mt-0">
                @yield('content')
            </div>
        </div>
    </div>

    @stack('scripts')
    @stack('animations')
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
