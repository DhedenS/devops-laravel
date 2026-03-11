@extends('layouts/admin.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Produksi Beras</h4>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah Produksi</button>
    </div>

    <form method="GET" action="{{ route('produksi_beras.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari keterangan..." value="{{ request('search') }}">
            <button class="btn btn-primary">Cari</button>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Padi</th>
                <th>Nama Produk</th>
                <th>Jumlah Padi</th>
                <th>Jumlah Beras</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produksi_beras as $item)
                <tr>
                    <td>{{ $item->tanggal_produksi }}</td>
                    <td>{{ $item->padi->nama_padi }}</td>
                    <td>{{ $item->produk->nama_produk }}</td>
                    <td>{{ $item->jumlah_padi }}</td>
                    <td>{{ $item->jumlah_beras }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id_produksi }}">Edit</button>
                        <form action="{{ route('produksi_beras.destroy', $item->id_produksi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>

                        {{-- Modal Edit --}}
                        @include('admin.produksi_beras.edit', ['item' => $item])
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $produksi_beras->withQueryString()->links() }}
</div>

{{-- Modal Tambah --}}
@include('admin.produksi_beras.create')
@endsection
