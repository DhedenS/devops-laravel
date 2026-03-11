@extends('layouts/admin.admin')

@section('content')
<div class="container">
    <h4>Edit Produk</h4>

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

    <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="beras" {{ $produk->kategori == 'beras' ? 'selected' : '' }}>Beras</option>
                <option value="pupuk" {{ $produk->kategori == 'pupuk' ? 'selected' : '' }}>Pupuk</option>
                <option value="obat"  {{ $produk->kategori == 'obat'  ? 'selected' : '' }}>Obat</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $produk->harga) }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $produk->stok) }}" required>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <select class="form-select" id="satuan" name="satuan" required>
                <option value="">-- Pilih Satuan --</option>
                <option value="kg" {{ $produk->satuan == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                <option value="ltr" {{ $produk->satuan == 'ltr' ? 'selected' : '' }}>Liter (ltr)</option>
                <option value="sak" {{ $produk->satuan == 'sak' ? 'selected' : '' }}>Sak</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini</label><br>
            @if ($produk->gambar)
                <img src="{{ asset('storage/gambar_produk/' . $produk->gambar) }}" alt="Gambar Produk" style="max-height: 150px;">
            @else
                <p class="text-muted">Tidak ada gambar</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
