<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pelanggan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #333;
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            table-layout: auto;
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
        /* Atur tampilan saat dicetak */
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
    </style>

</head>
<body>
    <div class="container">
        <h2>Laporan Data Pelanggan</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $pelanggan->id }}</td>
                        <td>{{ $pelanggan->name }}</td>
                        <td>{{ $pelanggan->email }}</td>
                        <td>{{ $pelanggan->telepon }}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="margin-top: 50px; text-align: right;">
            @php
                setlocale(LC_TIME, 'id_ID.utf8', 'id_ID', 'id');
            @endphp
            <p>Jambi, {{ strftime('%d %B %Y') }}</p>
            <p><strong>Admin</strong></p>
            <br><br><br>
            <p>__________________________</p>
            <p></p>
        </div>
    </div>
</body>
</html>
