<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Berita::query();

    if ($request->has('search')) {
        $search = $request->search;
        $query->where('judul', 'like', "%{$search}%")
              ->orWhere('isi', 'like', "%{$search}%");
    }

    $beritas = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.berita.index', compact('beritas'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar_berita', 'public');
        }
    
        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambar,
        ]);
    
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
    return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $berita = Berita::findOrFail($id);
    
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && file_exists(storage_path('app/public/gambar_berita/' . $berita->gambar))) {
                unlink(storage_path('app/public/gambar_berita/' . $berita->gambar));
            }
    
            $gambarPath = $request->file('gambar')->store('gambar_berita', 'public');
            $berita->gambar = $gambarPath;
        }
    
        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $berita->gambar,
        ]);
    
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

    if ($berita->gambar && file_exists(storage_path('app/public/gambar_berita/' . $berita->gambar))) {
        unlink(storage_path('app/public/gambar_berita/' . $berita->gambar));
    }

    $berita->delete();

    return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
