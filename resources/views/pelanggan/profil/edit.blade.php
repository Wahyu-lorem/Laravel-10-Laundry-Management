@extends('pelanggan.layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Profil</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="telepon">Telepon:</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $user->telepon }}">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $user->alamat }}">
                </div>

                <div class="form-group">
                    <label for="foto">Foto Profil:</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password Baru (kosongkan jika tidak ingin mengubah):</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password Baru:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>

        </div>
    </div>
</div>
@endsection
