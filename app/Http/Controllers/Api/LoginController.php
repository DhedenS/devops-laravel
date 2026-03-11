<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid input',
                'errors' => $validator->errors(),
            ], 400);
        }

        // Cek apakah petani ada berdasarkan email atau username
        $petani = Petani::where('email', $request->login)
            ->orWhere('username', $request->login)
            ->first();

        // Validasi password
        if (!$petani || !Hash::check($request->password, $petani->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Membuat token baru
        $token = $petani->createToken('mobile')->plainTextToken;

        // Hanya kirimkan data yang diperlukan, hindari data sensitif seperti password
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => [
                'id_petani' => $petani->id_petani,
                'nama_lengkap' => $petani->nama_lengkap,
                'username' => $petani->username,
                'gender' => $petani->gender,
                'email' => $petani->email,
                'no_telp' => $petani->no_telp,
                'alamat' => $petani->alamat,
            ],
        ]);
    }
}
