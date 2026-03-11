<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petani;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfil()
    {
        return view('profile.profil');
    }

    public function editProfil()
    {
        return view('profile.editProfil');
    }

    public function updateProfil(Request $request)
    {
        $user = Petani::find(Auth::id());

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:petani,username,' . $user->id_petani . ',id_petani',
            'email' => 'required|email|max:255|unique:petani,email,' . $user->id_petani . ',id_petani',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'no_telp' => 'required|max:20',
            'alamat' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_lengkap', 'username', 'email', 'gender', 'no_telp', 'alamat']);

        if ($request->hasFile('logo')) {
            if ($user->logo) {
                Storage::delete('public/' . $user->logo);
            }
            $data['logo'] = $request->file('logo')->store('logo_petani', 'public');
        }

        $user->update($data);

        if ($user->role === 'admin') {
        return redirect('/admin/dashboard')->with('success', 'Profil berhasil diperbarui.');
    } else {
        return redirect('/')->with('success', 'Profil berhasil diperbarui.');
    }
    }
}
