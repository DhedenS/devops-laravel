<?php

namespace App\Http\Controllers;

use App\Models\Padi;
use Illuminate\Http\Request;
use App\Models\PengajuanPadi;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PengajuanPadiStatusNotification;
use Barryvdh\DomPDF\Facade\Pdf;

class PengajuanPadiController extends Controller
{
    public function penjualanView()
    {
        $padiList = Padi::all();
        return view('user.penjualan_padi.penjualanpadi', compact('padiList'));
    }

    // Proses simpan pengajuan
  public function store(Request $request)
{


    $request->validate([
        // 'user_id' => 'required|exists:users,id',
        'id_padi' => 'required|exists:padi,id_padi',
        'perlu_mobil' => 'required|boolean',
        'jumlah_karung' => 'required|integer|min:1',
        'tanggal_pengajuan' => 'required|date',
        'keterangan' => 'nullable|string',
    ]);
    PengajuanPadi::create([
        'id_petani' => auth()->user()->id_petani,
        'id_padi' => $request->id_padi,
        'perlu_mobil' => $request->perlu_mobil,
        'jumlah_karung' => $request->jumlah_karung,
        'tanggal_pengajuan' => $request->tanggal_pengajuan,
        'keterangan' => $request->keterangan,
        // Kolom berikut akan diisi oleh admin nanti
        'jumlah_kg' => null,
        'total_harga' => null,
        'status' => 'menunggu persetujuan', // default
    ]);

    return redirect()->back()->with('success', 'Pengajuan berhasil dikirim.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'jumlah_kg' => 'required|numeric|min:0',
        'total_harga' => 'required|integer|min:0',
        'status' => 'required|in:disetujui,ditolak',
        'keterangan' => 'nullable|string',
    ]);

    $pengajuan = PengajuanPadi::findOrFail($id);
    $pengajuan->jumlah_kg = $request->jumlah_kg;
    $pengajuan->total_harga = $request->total_harga;
    $pengajuan->status = $request->status;
    $pengajuan->keterangan = $request->keterangan;
    $pengajuan->save();

    return redirect()->route('pengajuanpadi.index')->with('success', 'Pengajuan berhasil diperbarui.');
}


    // View admin: lihat semua pengajuan
    public function index()
    {
        $pengajuanList = PengajuanPadi::with('petani', 'padi')->latest()->get();
        return view('admin.pengajuanpadi.index', compact('pengajuanList'));
    }

    // Admin update status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        $pengajuan = PengajuanPadi::findOrFail($id);
        $pengajuan->update(['status' => $request->status]);

        $pengajuan->petani->notify(new PengajuanPadiStatusNotification($request->status));

        return back()->with('success', 'Status berhasil diperbarui.');
    }

    public function adminUpdate(Request $request, $id)
{
    $request->validate([
        'jumlah_kg' => 'required|numeric|min:1',
        'total_harga' => 'required|numeric|min:0',
        'status' => 'required|in:disetujui,ditolak',
    ]);

    $pengajuan = PengajuanPadi::findOrFail($id);

    $pengajuan->update([
        'jumlah_kg' => $request->jumlah_kg,
        'total_harga' => $request->total_harga,
        'status' => $request->status,
    ]);

    return redirect()->back()->with('success', 'Data pengajuan berhasil diperbarui oleh admin.');
}
public function destroy($id)
{
    $pengajuan = PengajuanPadi::findOrFail($id);
    $pengajuan->delete();

    return redirect()->route('pengajuanpadi.index')->with('success', 'Data pengajuan berhasil dihapus.');
}


public function cetakSemuaHTML()
{
    
    $pengajuanList = PengajuanPadi::with('petani', 'padi')->get();
    return view('admin.pengajuanpadi.cetak', compact('pengajuanList'));
}

public function cetakSemuaPDF()
{
    $pengajuanList = PengajuanPadi::with('petani', 'padi')->get();
    $pdf = Pdf::loadView('admin.pengajuanpadi.cetak', compact('pengajuanList'))->setPaper('a4', 'landscape');
    return $pdf->download('Data_Pengajuan_Padi.pdf');
}

}
