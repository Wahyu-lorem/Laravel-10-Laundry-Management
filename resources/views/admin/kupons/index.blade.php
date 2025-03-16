@extends('admin.layouts.app')
@section('title', 'Kupon')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url()->previous() }}" class="text-dark">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                    </a>
                    <h3>Daftar Kupon Diskon </h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover text-center">
                    @if($kupons->isEmpty())
                        <p class="text-center mt-5">Belum ada kupon.</p>
                    @else
                        <thead class="table-primary">
                            <tr>
                                <th>Kode Kupon</th>
                                <th>Diskon</th>
                                <th>Berlaku Hingga</th>
                                <th>Status</th>
                                <th>Nama Pelanggan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kupons as $kupon)
                            <tr>
                                <td>{{ $kupon->kode }}</td>
                                <td>{{ $kupon->diskon }} %</td>
                                <td>{{ $kupon->berlaku_hingga }}</td>
                                <td>
                                    @if($kupon->isExpired())
                                        <span class="badge bg-warning text-bold rounded-pill">Kadaluarsa</span>
                                    @else
                                        <span class="badge bg-success text-bold rounded-pill">Aktif</span>
                                    @endif
                                </td>

                                <td>{{ $kupon->user ? $kupon->user->name : 'Tidak tersedia' }}</td>
                                <td>
                                    <form action="{{ route('admin.kupons.destroy', $kupon) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kupon ini?')">Hapus</button>
                                    </form>
                                </td>
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
