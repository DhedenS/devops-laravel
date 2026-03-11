<?php

namespace App\Http\Controllers;

use App\Models\JenisSewa;
use Illuminate\Http\Request;

class JenisSewaController extends Controller
{
    public function index()
    {
        $sewas = JenisSewa::paginate(10);
        return view('admin.jenis_sewa.index', compact('sewas'));
    }

    public function create()
    {
        return view('admin.jenis_sewa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sewa' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric|min:0'
        ]);

        JenisSewa::create($request->only(['nama_sewa', 'harga_sewa']));

        return redirect()->route('jenis-sewa.index')->with('success', 'Jenis sewa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenis = JenisSewa::findOrFail($id);
        return view('admin.jenis_sewa.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sewa' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric|min:0'
        ]);

        $jenis = JenisSewa::findOrFail($id);
        $jenis->update($request->only(['nama_sewa', 'harga_sewa']));

        return redirect()->route('jenis-sewa.index')->with('success', 'Jenis sewa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        JenisSewa::findOrFail($id)->delete();
        return redirect()->route('jenis-sewa.index')->with('success', 'Jenis sewa berhasil dihapus.');
    }
}

