@extends('layouts/admin.admin')

@section('content')

<div class="container">
    <h2>Tambah Data Padi</h2>
    <form action="{{ route('padi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Padi</label>
            <input type="text" name="nama_padi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Warna</label>
            <input type="text" name="warna" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Bentuk</label>
            <input type="text" name="bentuk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tekstur</label>
            <input type="text" name="tekstur" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection