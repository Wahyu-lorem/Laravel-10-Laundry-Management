@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="mb-3">Laporan Kupon</h2>

        <a href="{{ route('admin.laporan.kupon.pdf') }}" class="btn btn-primary mb-3">
            Cetak Laporan PDF
        </a>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Pengguna</th>
                    <th>Kode Kupon</th>
                    <th>Diskon</th>
                    <th>Berlaku Hingga</th>
                    <th>Dibuat Pada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kupons as $index => $kupon)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kupon->user->name ?? 'N/A' }}</td>
                    <td>{{ $kupon->kode }}</td>
                    <td>{{ $kupon->diskon }}%</td>
                    <td>{{ \Carbon\Carbon::parse($kupon->berlaku_hingga)->format('d-m-Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($kupon->created_at)->format('d-m-Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
