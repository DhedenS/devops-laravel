<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetaniController extends Controller
{
    public function index(Request $request)
    {
        $query = Petani::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $petanis = $query->orderBy('nama_lengkap')->paginate(10);

        // AJAX response untuk pencarian + pagination
        if ($request->ajax()) {
            $table = view('admin.petani.partials._table', compact('petanis'))->render();
            $pagination = $petanis->appends($request->only('search'))->links()->render();

            return response()->json([
                'table' => $table,
                'pagination' => $pagination
            ]);
        }

        return view('admin.petani.index', compact('petanis'));
    }
    public function create()
    {
        return view('admin.petani.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:petani,alpha_num',
            'email' => 'required|email|unique:petani',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'no_telp' => 'required|string',
            'alamat' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,petani',
        ]);

        Petani::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'gender' => $request->gender,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'logo' => $request->logo,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('petani.index')->with('success', 'Data petani berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $petani = Petani::findOrFail($id);
        return view('admin.petani.edit', compact('petani'));
    }

    public function update(Request $request, $id)
    {
        $petani = Petani::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:petani,username,' . $id . ',id_petani',
            'email' => 'required|email|unique:petani,email,' . $id . ',id_petani',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'no_telp' => 'required|string',
            'alamat' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'role' => 'required|in:admin,petani',
        ]);

        $petani->update([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'gender' => $request->gender,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'role' => $request->role,
            'logo' => $request->logo,
            'password' => $request->filled('password') ? Hash::make($request->password) : $petani->password,
        ]);

        return redirect()->route('petani.index')->with('success', 'Data petani berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $petani = Petani::findOrFail($id);
        $petani->delete();
        return redirect()->route('petani.index')->with('success', 'Data petani berhasil dihapus.');
    }
}
