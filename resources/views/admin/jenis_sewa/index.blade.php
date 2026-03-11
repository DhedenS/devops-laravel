@extends('layouts/admin.admin')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Jenis Sewa</h4>
        <a href="{{ route('jenis-sewa.create') }}" class="btn btn-success">+ Tambah Jenis Sewa</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
    <tr>
        <th>ID</th>
        <th>Nama Jenis Sewa</th>
        <th>Harga Sewa</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @forelse ($sewas as $sewa)
        <tr>
            <td>{{ $sewa->id_sewa }}</td>
            <td>{{ $sewa->nama_sewa }}</td>
            <td>Rp {{ number_format($sewa->harga_sewa, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('jenis-sewa.edit', $sewa->id_sewa) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('jenis-sewa.destroy', $sewa->id_sewa) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jenis sewa ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">Tidak ada data jenis sewa.</td>
        </tr>
    @endforelse
</tbody>
    </table>

    {{-- Jika data $sewas di-controller pake paginate() --}}
    {{ $sewas->links() }}
</div>
@endsection
