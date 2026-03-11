@extends('layouts/admin.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Berita</h4>
        <a href="{{ route('berita.create') }}" class="btn btn-success">+ Tambah Berita</a>
    </div>

    <form method="GET" action="{{ route('berita.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berita..." value="{{ request('search') }}">
            <button class="btn btn-primary">Cari</button>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($beritas as $berita)
                <tr>
                    <td style="width: 120px;">
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid" style="max-height: 80px;">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>{{ $berita->judul }}</td>
                    <td style="max-width: 400px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ $berita->isi }}
                    </td>
                    <td style="width: 150px;">
                        <a href="{{ route('berita.edit', $berita->id_berita) }}" class="btn btn-warning btn-sm mb-1 w-100">Edit</a>
                        <form action="{{ route('berita.destroy', $berita->id_berita) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data berita.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $beritas->withQueryString()->links() }}
</div>
@endsection
