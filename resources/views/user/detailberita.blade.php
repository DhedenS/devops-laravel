@extends('layouts.user.user')
@section("content")

<section id="detailberita" class="py-5 bg-light">
    <div class="container">
        <!-- Judul Berita -->
        <h2 class="text-center text-success fw-bold mb-1" style="font-size: 2.5rem; line-height: 3;">{{ $berita->judul }}</h2>

        <!-- Foto Berita -->
        @if ($berita->gambar)
            <div class="text-center mb-3">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid rounded" style="max-height: 500px; object-fit: cover;">
            </div>
        @endif

        <!-- Isi Berita -->
        <div class="content">
            <p class="fs-5" style="white-space: pre-line;">
                {!! nl2br(e($berita->isi)) !!}
            </p>
        </div>
    </div>
</section>

@endsection
