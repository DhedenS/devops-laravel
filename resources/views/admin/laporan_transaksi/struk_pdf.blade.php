<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Transaksi - {{ $petani->nama_lengkap }}</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            font-size: 13px;
            padding: 20px;
            background: #f4fff2;
            color: #333;
        }
        .struk-container {
            max-width: 750px;
            margin: auto;
            background: #ffffff;
            border: 1px solid #cddfc8;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.05);
        }
        h2 {
            color: #2e7d32;
            border-bottom: 2px solid #a5d6a7;
            padding-bottom: 5px;
        }
        h3 {
            color: #33691e;
        }
        h4 {
            color: #558b2f;
            margin-top: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        th {
            background-color: #dcedc8;
            color: #33691e;
            padding: 10px;
            border: 1px solid #a5d6a7;
            text-align: left;
        }
        td {
            padding: 8px 10px;
            border: 1px solid #c5e1a5;
        }
        .totals p {
            font-weight: bold;
            color: #2e7d32;
        }
        .totals h3 {
            background: #dcedc8;
            padding: 10px;
            border-radius: 6px;
            color: #1b5e20;
        }
        .header p {
            margin: 4px 0;
        }
        @media print {
            body {
                background: #fff;
                padding: 0;
            }
            .struk-container {
                border: none;
                box-shadow: none;
                padding: 0;
                margin: 0;
            }
            th {
                -webkit-print-color-adjust: exact;
                background-color: #dcedc8 !important;
                color: #33691e !important;
            }
        }
    </style>
</head>
<body>
<div class="struk-container">
    <div class="header">
        <h2>Struk Transaksi Petani</h2>
        <p><strong>Nama Petani:</strong> {{ $petani->nama_lengkap }}</p>
    </div>

    <h4>Penjualan Padi</h4>
    <table>
        <thead>
        <tr>
            <th>ID Padi</th>
            <th>Jumlah (Kg)</th>
            <th>Total Harga</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dataPadi as $padi)
            <tr>
                <td>{{ $padi->id_padi }}</td>
                <td>{{ $padi->jumlah_kg }}</td>
                <td>Rp {{ number_format($padi->total_harga, 0, ',', '.') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Penyewaan</h4>
    <table>
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
                <td>{{ $sewa->id_sewa }}</td>
                <td>{{ $sewa->lama_sewa }}</td>
                <td>Rp {{ number_format($sewa->total_harga, 0, ',', '.') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="totals">
        <p>Total Harga Padi: Rp {{ number_format($totalHargaPadi, 0, ',', '.') }}</p>
        <p>Total Harga Sewa: Rp {{ number_format($totalHargaSewa, 0, ',', '.') }}</p>
        <h3>Sisa Pendapatan: Rp {{ number_format($sisaPendapatan, 0, ',', '.') }}</h3>
    </div>
</div>
</body>
</html>
