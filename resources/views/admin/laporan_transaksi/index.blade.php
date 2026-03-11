@extends('layouts/admin.admin')

@section('content')
<div class="container">
    <h3>Laporan Transaksi</h3>

    <hr>
    <h5>Penjualan Padi</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Padi</th>
                <th>Nama Petani</th>
                <th>Jumlah (Kg)</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataPadi as $padi)
            <tr>
                <td>{{ $padi->id_petani }}</td>
                 <td>{{ $padi->petani->nama_lengkap}} </td>
               
                <td>{{ $padi->jumlah_kg }} Kg</td>
                <td>Rp {{ number_format($padi->total_harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h5>Penyewaan</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Sewa</th>
                <th>Lama Sewa (Hari)</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataSewa as $sewa)
            <tr>
                <td>{{ $sewa->id_petani }}</td>
                <td>{{ $sewa->lama_sewa }} hari</td>
                <td>Rp {{ number_format($sewa->total_harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <h5>Total Harga Padi: Rp {{ number_format($totalHargaPadi, 0, ',', '.') }}</h5>
    <h5>Total Harga Sewa: Rp {{ number_format($totalHargaSewa, 0, ',', '.') }}</h5>
    <h5><strong>Sisa Pendapatan: Rp {{ number_format($sisaPendapatan, 0, ',', '.') }}</strong></h5>
<a href="{{ route('laporan.transaksi.cetak') }}" class="btn btn-danger" target="_blank">Cetak PDF</a>
<a href="{{ route('laporan.transaksi.cetak.html') }}" class="btn btn-primary" target="_blank">Cetak HTML</a>

</div>
@endsection
