<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kupon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 40px;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        .signature {
            margin-top: 60px;
            text-align: right;
        }
        .signature p {
            margin: 0;
        }
    </style>
</head>
<body>

    <h2>Laporan Kupon</h2>
    <p><strong>Tanggal Cetak:</strong> {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pengguna</th>
                <th>Kode Kupon</th>
                <th>Diskon</th>
                <th>Status</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kupons as $index => $kupon)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kupon->user->name ?? 'N/A' }}</td>
                <td>{{ $kupon->kode }}</td>
                <td>{{ $kupon->diskon }}%</td>
                <td>
                    @if($kupon->berlaku_hingga >= now())
                        <span style="color: green; font-weight: bold;">Aktif</span>
                    @else
                        <span style="color: red; font-weight: bold;">Tidak Aktif</span>
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($kupon->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <p><strong>Total Kupon:</strong> {{ $kupons->count() }}</p>
    </div>
    <div class="signature">
        @php
        setlocale(LC_TIME, 'id_ID.utf8', 'id_ID', 'id');
        @endphp
        <p>Jambi, {{ strftime('%d %B %Y') }}</p>
        <p><strong>Admin Laundry</strong></p>
        <br><br><br>
        <p>(____________________)</p>
    </div>

</body>
</html>
