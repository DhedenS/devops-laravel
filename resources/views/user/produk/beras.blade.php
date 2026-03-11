@extends('layouts.user.user')
@section("content")

<div class="container pt-5 mt-5">
<div class="container section-title" data-aos="fade-up">
        <h2 class="fw-bold">Produk</h2>
        <p class="lead">Produk pilihan untuk konsumsi dan agribisnis</p>
    </div>

    {{-- Kategori --}}
    <div class="mb-4 text-center">
        <a href="{{ url('produk/beras') }}" class="btn btn-success">Beras</a>
        <a href="{{ url('produk/pupuk') }}" class="btn ">Pupuk</a>
        <a href="{{ url('produk/obat') }}" class="btn ">Obat Tani</a>
    </div>

    {{-- Produk --}}
    <div class="row">
        @forelse($produk as $item)
            <div class="col-md-4 mb-4">
                <div class="border p-3 text-center h-100">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="img-fluid mb-3" style="height: 200px; object-fit: cover;">
                    <h5 class="text-success">{{ ucfirst($item->kategori) }}</h5>
                    <strong>{{ $item->nama_produk }}</strong>
                    <p>Stok: {{ $item->stok }}</p>
                    <h6 class="text-warning">RP. {{ number_format($item->harga, 0, ',', '.') }}</h6>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Tidak ada produk tersedia.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $produk->links() }}
    </div>
</div>

    

    @endsection