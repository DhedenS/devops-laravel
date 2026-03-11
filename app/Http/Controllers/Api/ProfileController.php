<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Petani;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        return response()->json([
            'data' => $request->user(), // pastikan model User atau Petani sudah sesuai
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required',
            'no_telp' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'logo' => 'required',
        ]);

        $user->update($request->only('nama_lengkap', 'username', 'no_telp', 'gender', 'alamat', 'logo'));

        return response()->json(['message' => 'Profil diperbarui']);
    }
}
