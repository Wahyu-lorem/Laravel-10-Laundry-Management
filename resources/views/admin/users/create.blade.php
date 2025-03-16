@extends('admin.layouts.app')
@section('title', 'Tambah User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url()->previous() }}" class="text-dark">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                    </a>
                     Tambah User
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <h3 class="text-uppercase text-sm">Informasi User</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Nama</label>
                                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telepon" class="form-control-label">Telepon</label>
                                    <input class="form-control" type="text" id="telepon" name="telepon" value="{{ old('telepon') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Alamat</label>
                                    <input class="form-control" type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                                </div>
                            </div>
                        </div>

                        <hr class="horizontal dark">

                        <h3 class="text-uppercase text-sm">INFORMASI TAMBAHAN</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-control-label">Confirm Password</label>
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="role" class="form-control-label">Role</label>
                                    <select class="form-control text-center" id="role" name="role" required>
                                        <option value="pelanggan">Pelanggan</option>
                                        <option value="karyawan">Karyawan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Save User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
