@extends('pelanggan.layouts.app')

@section('title', 'Riwayat Pesan')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Riwayat Pesan</h3>
        </div>
        <div class="card-body">
            @if($pesans->isEmpty())
                <p>Belum ada pesan yang dikirim.</p>
            @else
                <table class="table table-hover text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Pesan</th>
                            <th>Rating</th>
                            <th>Saran</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesans as $pesan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pesan->pesan }}</td>
                                <td>
                                    @if($pesan->rating)
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star {{ $i <= $pesan->rating ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                    @else
                                        Tidak ada rating
                                    @endif
                                </td>
                                <td>{{ $pesan->saran }}</td>
                                <td>{{ $pesan->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
