<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class PembelianProdukController extends Controller
{
     public function beras()
    {
        $produks = Produk::where('kategori', 'beras')->latest()->paginate(9);
        return view('user.produk.beras', compact('produks'));
    }

    public function pupuk()
    {
        $produks = Produk::where('kategori', 'pupuk')->latest()->paginate(9);
        return view('user.produk.pupuk', compact('produks'));
    }

    public function obat()
    {
        $produks = Produk::where('kategori', 'obat')->latest()->paginate(9);
        return view('user.produk.obat', compact('produks'));
    }
}
