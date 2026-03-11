<?php

namespace App\Http\Controllers;

use App\Models\ProduksiBeras;
use App\Models\Produk;
use App\Models\Padi;
use Illuminate\Http\Request;

class ProduksiBerasController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $produksi_beras = ProduksiBeras::with(['padi', 'produk'])
            ->when($search, function ($query, $search) {
                return $query->where('keterangan', 'like', "%{$search}%");
            })
            ->orderBy('tanggal_produksi', 'desc')
            ->paginate(10);

        $padi = Padi::all();
        $produk = Produk::all();

        return view('admin.produksi_beras.index', compact('produksi_beras', 'padi', 'produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required',
            'id_padi' => 'required',
            'tanggal_produksi' => 'required|date',
            'jumlah_padi' => 'required|integer',
            'jumlah_beras' => 'required|integer',
            'keterangan' => 'nullable|string'
        ]); 

        ProduksiBeras::create($request->all());

        return redirect()->route('admin.produksi_beras.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produksi_beras = ProduksiBeras::findOrFail($id);
        $padi = Padi::all();
        $produk = Produk::all();
        return view('admin.produksi_beras.edit', compact('produksi_beras', 'padi', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_produk' => 'required',
            'id_padi' => 'required',
            'tanggal_produksi' => 'required|date',
            'jumlah_padi' => 'required|integer',
            'jumlah_beras' => 'required|integer',
            'keterangan' => 'nullable|string'
        ]);

        $produksi_beras = ProduksiBeras::findOrFail($id);
        $produksi_beras->update($request->all());

        return redirect()->route('admin.produksi_beras.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $produksi_beras = ProduksiBeras::findOrFail($id);
        $produksi_beras->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }
}
