@extends('admin.layouts.app')

@section('title', 'Daftar Pesan')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Daftar Pesan</h3>
        </div>
        <div class="card-body">
            @if($pesans->isEmpty())
                <p>Tidak ada pesan yang dikirim.</p>
            @else
                <table class="table table-hover text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Pengirim</th>
                            <th>Pesan</th>
                            <th>Rating</th>
                            <th>Saran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesans as $pesan)
                            <tr>
                                <td>{{ $pesan->id }}</td>
                                <td>{{ $pesan->user->name }}</td>
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
                                <td>{{ $pesan->saran ?? '-' }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pesanModal-{{ $pesan->id }}">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

@foreach($pesans as $pesan)
<div class="modal fade" id="pesanModal-{{ $pesan->id }}" tabindex="-1" role="dialog" aria-labelledby="pesanModalLabel-{{ $pesan->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pesanModalLabel-{{ $pesan->id }}">Detail Pesan #{{ $pesan->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-4">Pengirim:</dt>
                    <dd class="col-sm-6">{{ $pesan->user->name }}</dd>

                    <dt class="col-sm-4">Alamat:</dt>
                    <dd class="col-sm-6">{{ $pesan->user->alamat }}</dd>

                    <dt class="col-sm-4">Pesan:</dt>
                    <dd class="col-sm-6">{{ $pesan->pesan }}</dd>

                    <dt class="col-sm-4">Rating:</dt>
                    <dd class="col-sm-6">
                        @if($pesan->rating)
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star {{ $i <= $pesan->rating ? 'text-warning' : 'text-muted' }}"></i>
                            @endfor
                        @else
                            Tidak ada rating
                        @endif
                    </dd>

                    <dt class="col-sm-4">Saran:</dt>
                    <dd class="col-sm-6">{{ $pesan->saran ?? '-' }}</dd>

                    <dt class="col-sm-4">Tanggal:</dt>
                    <dd class="col-sm-6">{{ $pesan->created_at->format('d-m-Y H:i') }}</dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endforeach
@endsection
