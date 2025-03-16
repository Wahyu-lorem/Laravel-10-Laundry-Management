@extends('admin.layouts.app')

@section('title', 'Daftar Pelanggan')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <p>
                <a href="{{ url()->previous() }}" class="text-dark">
                    <i class="fa-solid fa-arrow-left fa-lg"></i>
                </a>
                <h1>Daftar Pelanggan </h1>
            </p>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <form method="GET" action="{{ route('admin.pelanggan.index') }}" class="d-flex align-items-center">
                    <input type="text" name="search" class="form-control my-4" placeholder="Cari Nama Pelanggan" value="{{ request('search') }}">
                </form>
            </div>
            <table class="table table-hover text-center">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Online</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $pelanggan->id }}</td>
                        <td>{{ $pelanggan->name }}</td>
                        <td>{{ $pelanggan->email }}</td>
                        <td>{{ $pelanggan->telepon }}</td>
                        <td>
                            @if (is_null($pelanggan->last_accessed_at))
                            <span>-</span>
                            @elseif ($pelanggan->isOnline())
                                <span class="badge bg-primary">Online</span>
                            @else
                                <span class="text-muted">Terakhir online: {{ \Carbon\Carbon::parse($pelanggan->last_accessed_at)->diffForHumans() }}</span>
                            @endif
                        </td>
                        <td class="text-sm">{!! $pelanggan->status_label !!}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a href="#" class="text-dark" role="button" id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end min-w-auto border rounded-0" aria-labelledby="actionDropdown">
                                    <li>
                                        <a href="{{ route('admin.users.edit', $pelanggan->id) }}" class="dropdown-item bg-dark-soft-hover">
                                            <i class="fa-solid fa-edit me-2"></i>Edit
                                        </a>
                                    </li>
                                    @if ($pelanggan->status == 0)
                                        <form method="POST" action="{{ route('admin.users.activate', $pelanggan->id) }}">
                                            @csrf
                                            <li>
                                                <button type="submit" class="dropdown-item bg-dark-soft-hover">
                                                    <i class="fa-solid fa-check me-2"></i>Aktifkan
                                                </button>
                                            </li>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.users.deactivate', $pelanggan->id) }}">
                                            @csrf
                                            <li>
                                                <button type="submit" class="dropdown-item bg-dark-soft-hover">
                                                    <i class="fa-solid fa-times me-2"></i>Nonaktifkan
                                                </button>
                                            </li>
                                        </form>
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-left">
                {{ $pelanggans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
