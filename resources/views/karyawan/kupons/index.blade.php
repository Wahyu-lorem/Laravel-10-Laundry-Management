@extends('karyawan.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Daftar Kupon Diskon </h3> </div>
                <div class="card-body">
                    <table class="table text-center">
                    @if($kupons->isEmpty())
                        <p class="text-center mt-5">Belum ada kupon.</p>
                    @else
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Kode Kupon</th>
                                <th>Diskon</th>
                                <th>Berlaku Hingga</th>
                                <th>Nama Pelanggan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kupons as $kupon)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kupon->kode }}</td>
                                <td>{{ $kupon->diskon }} %</td>
                                <td>{{ $kupon->berlaku_hingga }}</td>
                                <td>{{ $kupon->user ? $kupon->user->name : 'Tidak tersedia' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                     @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
