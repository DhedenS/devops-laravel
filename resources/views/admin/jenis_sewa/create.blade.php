@extends('layouts/admin.admin')
@section('content')

<div class="container">
    <h1>Tambah Jenis Sewa</h1>
    <form action="{{ route('jenis-sewa.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Sewa</label>
            <input type="text" name="nama_sewa" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Sewa (per hari)</label>
            <input type="number" name="harga_sewa" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

@endsection
