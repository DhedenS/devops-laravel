@extends('layouts/admin.admin')

@section('content')

<div class="container">
    <h2>Edit Berita</h2>
    <form action="{{ route('berita.update', $berita->id_berita) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <!-- Menampilkan gambar jika ada -->
            @if ($berita->gambar)
                <div>
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="img-thumbnail" width="100">
                </div>
            @endif
            
            <!-- Input file untuk mengganti gambar -->
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div> 
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Isi</label>
            <input type="text" name="isi" class="form-control" value="{{ $berita->isi }}" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection