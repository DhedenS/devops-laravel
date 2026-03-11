<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use App\Models\ProduksiBeras;
use App\helper\FirebaseHelper;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use NumberFormatter;
class AdminController extends Controller
{
    public function index()
    {



        return view('admin.dashboard',[
            "petani" => ["Total" => Petani::count(),'CurrentMonth'=>Petani::currentMonth(),'LastMonth'=>Petani::lastMonth()],
            "penjualan"=> ["Total" => '-'],
            "produksiBeras" => ["Total"=>ProduksiBeras::sum(column: 'jumlah_beras')],
            'pendapatan'=>["Total"=>Transaksi::sum('total'),'CurrentMonth'=>Transaksi::currentMonth()->sum('total')]
        ]);
    }

        public function sendNotification(){
        $response = FirebaseHelper::sendFCMNotification();
            return $response;
        }
}
