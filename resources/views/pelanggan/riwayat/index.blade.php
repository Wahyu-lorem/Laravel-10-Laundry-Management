@extends('pelanggan.layouts.app')
@section('title', 'Daftar Transaksi')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Riwayat Transaksi - {{ Auth::user()->name }}</h3>
        </div>
        <div class="card-body">
            @if($transaksis->isEmpty())
                <p>Belum ada transaksi.</p>
            @else
                <table class="table table-hover text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Paket</th>
                            <th>Estimasi</th>
                            <th>Tanggal</th>
                            <th>Kilogram</th>
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksis as $transaksi)
                            <tr>
                                <td>{{ $transaksi->invoice }}</td>
                                <td>{{ $transaksi->paket }}</td>
                                <td>{{ $transaksi->hari }} Hari</td>
                                <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ number_format($transaksi->kilogram, 0, ',', '.') }} kg</td>
                                <td>Rp {{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                                <td> {!! $transaksi->status_non_label !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
