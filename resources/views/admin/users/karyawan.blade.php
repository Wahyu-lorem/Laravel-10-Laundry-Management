@extends('admin.layouts.app')
@section('title', 'Daftar Karyawan')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <p>
                <a href="{{ url()->previous() }}" class="text-dark">
                    <i class="fa-solid fa-arrow-left fa-lg"></i>
                </a>
                <h1>Daftar Karyawan </h1>
            </p>
        </div>
        <div class="card-body">
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
                    @foreach($karyawans as $karyawan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $karyawan->name }}</td>
                        <td>{{ $karyawan->email }}</td>
                        <td>{{ $karyawan->telepon }}</td>
                        <td>
                            @if ($karyawan->isOnline())
                                <span class="badge bg-primary">Online</span>
                            @else
                                <span class="text-muted">Terakhir online: {{ \Carbon\Carbon::parse($karyawan->last_accessed_at)->diffForHumans() }}</span>
                            @endif
                        </td>

                        <td>{!! $karyawan->status_label !!}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a href="#" class="text-dark" role="button" id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end min-w-auto border rounded-0" aria-labelledby="actionDropdown">
                                    <li>
                                        <a href="{{ route('admin.users.edit', $karyawan->id) }}" class="dropdown-item bg-dark-soft-hover">
                                            <i class="fa-solid fa-edit me-2"></i>Edit
                                        </a>
                                    </li>
                                    @if ($karyawan->status == 0)
                                        <form method="POST" action="{{ route('admin.users.activate', $karyawan->id) }}">
                                            @csrf
                                            <li>
                                                <button type="submit" class="dropdown-item bg-dark-soft-hover">
                                                    <i class="fa-solid fa-check me-2"></i>Aktifkan
                                                </button>
                                            </li>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.users.deactivate', $karyawan->id) }}">
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
        </div>
    </div>
</div>
@endsection
