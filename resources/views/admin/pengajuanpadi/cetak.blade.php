<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Data Pengajuan Padi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #207f35;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #888;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color: #e0f2e9;
        }
    </style>
</head>
<body>
    <h2>Data Pengajuan Penjualan Padi</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Petani</th>
                <th>Jenis Padi</th>
                <th>Jumlah Karung</th>
                <th>Perlu Mobil</th>
                <th>Jumlah KG</th>
                <th>Total Harga</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuanList as $key => $pengajuan)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $pengajuan->petani->nama_lengkap }}</td>
                <td>{{ $pengajuan->padi->jenis_padi }}</td>
                <td>{{ $pengajuan->jumlah_karung }}</td>
                <td>{{ $pengajuan->perlu_mobil ? 'Ya' : 'Tidak' }}</td>
                <td>{{ $pengajuan->jumlah_kg ?? '-' }}</td>
                <td>Rp {{ number_format($pengajuan->total_harga ?? 0, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('d/m/Y') }}</td>
                <td>{{ ucfirst($pengajuan->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
