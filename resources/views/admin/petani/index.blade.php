@extends('layouts/admin.admin')

@section('content')
    <div class="container mt-4 style="margin-left: 700px;">
        <div class="card shadow rounded">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-people-fill"></i> Data Petani</h4>
                <a href="{{ route('petani.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> Tambah
                    Petani</a>
            </div>

            <div class="card-body">
                {{-- Alert sukses --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Form Pencarian --}}
                <form method="GET" class="mb-3 d-flex">
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                        class="form-control me-2" placeholder="Cari nama, username, email...">
                </form>

                {{-- Tabel Data --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @include('admin.petani.partials._table', ['petanis' => $petanis])
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center" id="pagination-wrapper">
                    {{ $petanis->appends(request()->only('search'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Bootstrap Icons & jQuery --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            function fetch_data(query, page = 1) {
                $.ajax({
                    url: "{{ route('petani.index') }}",
                    type: "GET",
                    data: {
                        search: query,
                        page: page
                    },
                    success: function(response) {
                        $('#table-body').html(response.table);
                        $('#pagination-wrapper').html(response.pagination);
                    }
                });
            }

            $('#search').on('keyup', function() {
                let query = $(this).val();
                fetch_data(query);
            });

            $(document).on('click', '#pagination-wrapper .pagination a', function(e) {
                e.preventDefault();
                let query = $('#search').val();
                let page = $(this).attr('href').split('page=')[1];
                fetch_data(query, page);
            });
        });
    </script>
@endpush
