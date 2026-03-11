<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Padi;
use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
{
    $berita = Berita::latest()->get();
    $padi = Padi::latest()->get();
     // Ambil 3 berita terbaru
    return view('user.beranda', compact('berita', 'padi'));
}

public function detail($id)
{
    $berita = Berita::findOrFail($id);
    return view('user.detailberita', compact('berita'));
}

public function produkByKategori($kategori)
{
    $validKategori = ['beras', 'pupuk', 'obat'];

    if (!in_array($kategori, $validKategori)) {
        abort(404);
    }

    $produk = Produk::where('kategori', $kategori)->latest()->paginate(12);

    $viewPath = "user.produk.$kategori";

    if (!view()->exists($viewPath)) {
        abort(404);
    }

    return view($viewPath, compact('produk'));
}

}
