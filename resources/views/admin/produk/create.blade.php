@extends('layouts/admin.admin')

@section('content')
<div class="container">
    <h4>Tambah Produk</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" value="{{ old('nama_produk') }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" name="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="beras" {{ old('kategori') == 'beras' ? 'selected' : '' }}>Beras</option>
                <option value="pupuk" {{ old('kategori') == 'pupuk' ? 'selected' : '' }}>Pupuk</option>
                <option value="obat"  {{ old('kategori') == 'obat'  ? 'selected' : '' }}>Obat</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" value="{{ old('harga') }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" value="{{ old('stok') }}" required>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <select class="form-select" name="satuan" required>
                <option value="">-- Pilih Satuan --</option>
                <option value="kg" {{ old('satuan') == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                <option value="liter" {{ old('satuan') == 'liter' ? 'selected' : '' }}>Liter (liter)</option>
                <option value="pak" {{ old('satuan') == 'pak' ? 'selected' : '' }}>Pak</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" name="gambar" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
