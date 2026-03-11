<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // =====================
    // REGISTER
    // =====================
    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'username' => 'required|string|unique:petani',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'email' => 'required|email|unique:petani',
            'no_telp' => 'required|string',
            'alamat' => 'required|string',
            'password' => 'required|min:6',
        ]);

        $petani = Petani::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'gender' => $request->gender,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        $token = $petani->createToken('mobile')->plainTextToken;

        return response()->json([
            'message' => 'Registrasi berhasil',
            'petani' => [
                'id' => $petani->id,
                'nama_lengkap' => $petani->nama_lengkap,
                'username' => $petani->username,
                'gender' => $petani->gender,
                'email' => $petani->email,
                'no_telp' => $petani->no_telp,
                'alamat' => $petani->alamat,
            ],
            'token' => $token,
        ], 201);
    }
}