@extends('layouts/admin.admin')

@section('content')
    <h2>jenis Padi</h2>
    <p>Selamat datang di halaman Jenis Padi.</p>

    <a href="{{ route('padi.create')}}" class="btn btn-primary">Tambah Padi</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Padi</th>
                <th>Warna</th>
                <th>Bentuk</th>
                <th>Tekstur Beras</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($padis as $padi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('storage/'.$padi->gambar) }}" alt="{{ $padi->nama_padi }}" class="img-fluid" style="width: 120px; height: 90px; object-fit: cover; border-radius: 5px;">
                </td>
                <td>{{ $padi->nama_padi }}</td>
                <td>{{ $padi->warna }}</td>
                <td>{{ $padi->bentuk }}</td>
                <td>{{ $padi->tekstur }}</td>
                <td>Rp{{ number_format($padi->harga, 0, ',', '.') }}</td>
                <td>{{ $padi->stok }}</td>
                <td>
                    <a href="{{ route('padi.edit', $padi) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('padi.destroy', $padi) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection
