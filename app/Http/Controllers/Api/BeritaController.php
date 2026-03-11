<?php

namespace App\Http\Controllers\Api;

use App\Models\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();

        return response()->json([
            'status' => true,
            'message' => 'List Berita',
            'data' => $beritas
        ]);
    }

    public function show($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json([
                'status' => false,
                'message' => 'Berita tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail Berita',
            'data' => $berita
        ]);
    }
}
