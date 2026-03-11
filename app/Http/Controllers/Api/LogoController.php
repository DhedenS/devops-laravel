<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class LogoController extends Controller
{
    public function uploadImage(Request $request)
    {
        $user = Petani::Auth();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // Hapus file lama jika ada
            if ($user->logo) {
                Storage::disk('public')->delete($user->logo);
            }

            $path = $request->file('logo')->store('logo_petani', 'public');

            $user->logo = $path;
            $user->save();

            return response()->json([
                'message' => 'Gambar berhasil diupload',
                'logo' => $path,
            ]);
        }

        return response()->json(['message' => 'File tidak ditemukan'], 400);
    }
}
