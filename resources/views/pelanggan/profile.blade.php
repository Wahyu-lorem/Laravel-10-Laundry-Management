@extends('pelanggan.layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Profil Pengguna</h3>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4 text-center">
                    <img src="{{ $user->foto ? asset('storage/profiles/' . $user->foto) : asset('storage/profiles/avatar.png') }}"
                    class="rounded-circle border shadow-sm" width="150" height="150" alt="Foto Profil">
                </div>
                <div class="col-md-8">
                    <h4>{{ $user->name }}</h4>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Telepon:</strong> {{ $user->telepon }}</p>
                    <p><strong>Alamat:</strong> {{ $user->alamat }}</p>
                </div>
            </div>
            <div class="text-right">
                <a href="{{ route('profil.edit') }}" class="btn btn-primary">Edit Profil</a>
            </div>
        </div>
    </div>
</div>
@endsection
