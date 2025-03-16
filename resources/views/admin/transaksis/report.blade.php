<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
            color: #333;
        }
        h3 {
            text-align: center;
            color: #007bff;
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            table-layout: auto;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 12px;
            word-wrap: break-word;
        }
        th {
            background: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        tr:hover {
            background: #e9ecef;
        }
        .text-center {
            text-align: center;
        }
        .harga {
            min-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .invoice {
            min-width: 50px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .total-row {
            font-weight: bold;
            background-color: #007bff;
            color: white;
        }
        /* Tampilan cetak */
        @media print {
            body {
                font-size: 10px;
            }
            .container {
                margin: 0;
                padding: 0;
            }
            table {
                font-size: 10px;
            }
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Laporan Transaksi dengan status {{ $statusLabel }}</h3>
        <table>
            <thead>
                <tr>
                    <th>Invoice</th>
                    <th>Nama Pelanggan</th>
                    <th>Paket</th>
                    <th>Tanggal</th>
                    <th>Kilogram</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php $totalHarga = 0; @endphp
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td class="invoice">{{ $transaksi->invoice }}</td>
                        <td>{{ $transaksi->user->name }}</td>
                        <td>{{ $transaksi->paket }}</td>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td class="text-center">{{ $transaksi->kilogram }}</td>
                        <td class="harga">Rp {{ number_format($transaksi->harga, 0) }}</td>
                        <td class="text-center">
                            @switch($transaksi->status)
                                @case(0) Baru @break
                                @case(1) Diterima @break
                                @case(2) Laundry @break
                                @case(3) Selesai @break
                                @case(4) Diambil @break
                            @endswitch
                        </td>
                    </tr>
                    @php $totalHarga += $transaksi->harga; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="5" style="text-align: right;">Total Harga</td>
                    <td>Rp {{ number_format($totalHarga, 0) }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <div class="signature">
            @php
                setlocale(LC_TIME, 'id_ID.utf8', 'id_ID', 'id');
            @endphp
            <p>Jambi, {{ strftime('%d %B %Y') }}</p>
            <p><strong>Admin</strong></p>
            <br><br><br>
            <p>__________________________</p>
        </div>
    </div>
</body>
</html>
