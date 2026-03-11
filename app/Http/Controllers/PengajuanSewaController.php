<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSewa;
use App\Models\JenisSewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanSewaController extends Controller
{
    public function formView($jenis)
    {
        $viewPath = "user.layanan.$jenis";
        
        if (!view()->exists($viewPath)) {
            abort(404);
        }

        $sewaList = JenisSewa::all();
        return view($viewPath, compact('sewaList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_sewa' => 'required|exists:jenis_sewa,id_sewa',
            'tanggal_sewa' => 'required|date',
            'lama_sewa_hari' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        // Ambil harga sewa berdasarkan id_sewa
        $jenisSewa = JenisSewa::findOrFail($request->id_sewa);
        $biayaSewa = $jenisSewa->harga_sewa * $request->lama_sewa_hari;

        PengajuanSewa::create([
            'id_petani' => Auth::user()->id_petani,
            'id_sewa' => $request->id_sewa,
            'tanggal_sewa' => $request->tanggal_sewa,
            'lama_sewa_hari' => $request->lama_sewa_hari,
            'biaya_sewa' => $biayaSewa,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Pengajuan sewa berhasil diajukan.');
    }

    public function index()
    {
        $pengajuanList = PengajuanSewa::with('petani', 'jenisSewa')->latest()->get();
        return view('admin.pengajuansewa.index', compact('pengajuanList'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        $pengajuan = PengajuanSewa::findOrFail($id);
        $pengajuan->update(['status' => $request->status]);

        return back()->with('success', 'Status pengajuan sewa berhasil diperbarui.');
    }
}
