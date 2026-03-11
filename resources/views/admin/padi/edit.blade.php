@extends('layouts/admin.admin')

@section('content')

<div class="container">
    <h2>Edit Data Padi</h2>
    <form action="{{ route('padi.update', $padi->id_padi) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <!-- Menampilkan gambar jika ada -->
            @if ($padi->gambar)
                <div>
                    <img src="{{ asset('storage/' . $padi->gambar) }}" alt="Gambar Padi" class="img-thumbnail" width="100">
                </div>
            @endif
            
            <!-- Input file untuk mengganti gambar -->
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Padi</label>
            <input type="text" name="nama_padi" class="form-control" value="{{ $padi->nama_padi }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Warna</label>
            <input type="text" name="warna" class="form-control" value="{{ $padi->warna }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Bentuk</label>
            <input type="text" name="bentuk" class="form-control" value="{{ $padi->bentuk }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tekstur</label>
            <input type="text" name="tekstur" class="form-control" value="{{ $padi->tekstur }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $padi->harga }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $padi->stok }}" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection