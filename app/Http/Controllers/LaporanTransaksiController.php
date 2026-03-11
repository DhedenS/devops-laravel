<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Petani;
use App\Models\PengajuanPadi;
use App\Models\PengajuanSewa;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanTransaksiController extends Controller
{
    
public function index()
{
    $petani = Petani::all();

    // Array untuk menyimpan data per petani
    $laporan = [];

    foreach ($petani as $petani) {
    }
    $dataPadi = PengajuanPadi::orderBy("created_at","desc")->limit(1)->get();
    $dataSewa = PengajuanSewa::where("id_petani",$dataPadi[0]->id_petani)->orderBy("created_at","desc")->limit(1)->get();

    $totalHargaPadi = $dataPadi->sum('total_harga');
    $totalHargaSewa = $dataSewa->sum('total_harga');
    $sisaPendapatan = $totalHargaPadi - $totalHargaSewa;

    $laporan[] = [
        'petani' => $petani,
        'dataPadi' => $dataPadi,
        'dataSewa' => $dataSewa,
        'totalHargaPadi' => $totalHargaPadi,
        'totalHargaSewa' => $totalHargaSewa,
        'sisaPendapatan' => $sisaPendapatan,
    ];
    // dd($laporan);


    return view('admin.laporan_transaksi.index', compact('petani','laporan','dataPadi','dataSewa','totalHargaPadi', 'totalHargaSewa', 'sisaPendapatan'));
}


public function cetakPDF()
{
    $id_petani = Auth::user()->id_petani;
    $petani = Petani::findOrFail($id_petani);

        $dataPadi = PengajuanPadi::orderBy("created_at","desc")->limit(1)->get();
    $dataSewa = PengajuanSewa::where("id_petani",$dataPadi[0]->id_petani)->orderBy("created_at","desc")->limit(1)->get();


    $totalHargaPadi = $dataPadi->sum('total_harga');
    $totalHargaSewa = $dataSewa->sum('total_harga');
    $sisaPendapatan = $totalHargaPadi - $totalHargaSewa;

$pdf = PDF::loadHTML(mb_convert_encoding(
    view('admin.laporan_transaksi.struk_pdf', compact(
        'petani', 'dataPadi', 'dataSewa', 'totalHargaPadi', 'totalHargaSewa', 'sisaPendapatan'
    ))->render(), 'HTML-ENTITIES', 'UTF-8'
));

    return $pdf->stream('struk_transaksi_'.$petani->nama.'.pdf');
}

public function cetakHTML()
{
    $id_petani = Auth::user()->id_petani;
    $petani = Petani::findOrFail($id_petani);
    
       $dataPadi = PengajuanPadi::orderBy("created_at","desc")->limit(1)->get();
    $dataSewa = PengajuanSewa::where("id_petani",$dataPadi[0]->id_petani)->orderBy("created_at","desc")->limit(1)->get();


    $totalHargaPadi = $dataPadi->sum('total_harga');
    $totalHargaSewa = $dataSewa->sum('total_harga');
    $sisaPendapatan = $totalHargaPadi - $totalHargaSewa;
    return view('admin.laporan_transaksi.struk_pdf', compact(
        'petani', 'dataPadi', 'dataSewa', 'totalHargaPadi', 'totalHargaSewa', 'sisaPendapatan'
    ));
}

}