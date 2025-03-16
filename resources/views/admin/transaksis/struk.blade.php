<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            width: 80mm;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 10px;
            text-align: center;
        }

        .header {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .header p {
            font-size: 12px;
            margin: 2px;
        }

        .details, .totals {
            font-size: 12px;
            margin-bottom: 10px;
            text-align: left;
        }

        .items {
            margin-bottom: 15px;
        }

        .items table {
            width: 100%;
            font-size: 12px;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .items table th, .items table td {
            padding: 5px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .items table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .totals p {
            font-weight: bold;
        }

        .footer {
            font-size: 10px;
            margin-top: 15px;
        }

        .footer p {
            font-style: italic;
            margin-top: 5px;
        }

        .line {
            border-top: 1px dashed #ddd;
            margin: 10px 0;
        }

    </style>
</head>
<body onload="window.print();">
    <div class="container">
        <div class="header">
            <h1>LAUNDRY <br> AL-FARIZI</h1>
            <p>Jl. Dr. Sumbiyono, Kebun Handil, Kec. Jelutung, Kota Jambi</p>
            <p>Telepon: 08123456789</p>
        </div>

        <div class="line"></div>

        <div class="details">
            <p><strong>Invoice:</strong> {{ $transaksi->invoice }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</p>
            <p><strong>Pelanggan:</strong> {{ $transaksi->user->name }}</p>
            <p><strong>Email:</strong> {{ $transaksi->user->email }}</p>
            <p><strong>Password:</strong> pelanggan123</p>
            <p><strong>Telepon:</strong> {{ $transaksi->user->telepon }}</p>
        </div>

        <div class="line"></div>

        <div class="items">
            <table>
                <thead>
                    <tr>
                        <th>Paket</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $transaksi->paket }}</td>
                        <td>{{ number_format($transaksi->kilogram, 0, ',', '.') }} kg</td>
                        <td>Rp {{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="line"></div>

        <div class="totals">
            <p><strong>Total Bayar:</strong> Rp {{ number_format($transaksi->harga, 0, ',', '.') }}</p>
            @if ($transaksi->coupon)
                <p><strong>Diskon ({{ $transaksi->coupon->code }}):</strong> -Rp {{ number_format($transaksi->coupon->discount, 0, ',', '.') }}</p>
                <p><strong>Total Setelah Diskon:</strong> Rp {{ number_format($transaksi->harga - $transaksi->coupon->discount, 0, ',', '.') }}</p>
            @endif
        </div>

        <div class="line"></div>

        <div class="footer">
            <p>Terima Kasih atas Kunjungan Anda!</p>
            <p>Harap datang lagi untuk layanan terbaik kami.</p>
        </div>
    </div>
</body>
</html>
