@extends('admin.layouts.app')
@section('title', 'Paket')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Paket Laundry</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.pakets.create') }}" class="btn btn-primary mb-3">Tambah Paket</a>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-hover text-center">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama Paket</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Estimasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pakets as $paket)
                    <tr>
                        <td>{{ $paket->id }}</td>
                        <td>{{ $paket->nama_paket }}</td>
                        <td>{{ $paket->deskripsi }}</td>
                        <td>Rp {{ number_format($paket->harga, 0, ',', '.') }}</td>
                        <td>{{ $paket->lama_pengerjaan }} Hari</td>
                        <td class="text-sm">{!! $paket->status_label !!}</td>
                        <td>
                            <div class="ms-4">
                                <a href="#" class="text-dark" role="button" id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <input type="hidden" name="paket_id" value="{{ $paket->id }}">
                                <ul class="dropdown-menu dropdown-menu-end min-w-auto border rounded-0" aria-labelledby="actionDropdown">
                                    @if ($paket->status == 0)
                                        <form method="POST" action="{{ route('admin.pakets.activate', $paket->id) }}">
                                            @csrf
                                            <li>
                                                <button type="submit" class="dropdown-item bg-dark-soft-hover">
                                                    <i class="fa-solid fa-check me-2"></i>Aktif
                                                </button>
                                            </li>
                                        </form>
                                    @endif
                                    @if ($paket->status == 1)
                                        <form method="POST" action="{{ route('admin.pakets.deactivate', $paket->id) }}">
                                            @csrf
                                            <li>
                                                <button type="submit" class="dropdown-item bg-dark-soft-hover">
                                                    <i class="fa-solid fa-times-circle me-2"></i>Nonaktif
                                                </button>
                                            </li>
                                        </form>
                                    @endif
                                    <li>
                                        <a href="{{ route('admin.pakets.edit', $paket->id) }}" class="dropdown-item bg-dark-soft-hover">
                                            <i class="fa-solid fa-edit me-2"></i>Edit
                                        </a>
                                    </li>

                                    <form method="POST" action="{{ route('admin.pakets.destroy', $paket->id) }}">
                                        @csrf @method('DELETE')
                                        <li>
                                            <button type="submit" class="dropdown-item bg-danger-soft-hover">
                                                <i class="fa-solid fa-trash me-2"></i>Hapus
                                            </button>
                                        </li>
                                    </form>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-left">
                {{ $pakets->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
