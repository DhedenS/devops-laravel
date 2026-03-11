@extends('layouts/admin.admin')
@section('content')

<div class="container">
    <h1>Edit Jenis Sewa</h1>
    <form action="{{ route('jenis-sewa.update', $jenis->id_sewa) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Sewa</label>
            <input type="text" name="nama_sewa" class="form-control" value="{{ $jenis->nama_sewa }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Sewa</label>
            <input type="number" name="harga_sewa" class="form-control" value="{{ $jenis->harga_sewa }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

@endsection
