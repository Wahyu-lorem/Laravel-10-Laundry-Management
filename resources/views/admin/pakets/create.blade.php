@extends('admin.layouts.app')
@section('title', isset($paket) ? 'Update Paket' : 'Tambah Paket')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <a href="{{ url()->previous() }}" class="text-dark">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                    </a>
                    <h3 class="mb-0">{{ isset($paket) ? 'Update Paket' : 'Tambah Paket' }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($paket) ? route('admin.pakets.update', $paket->id) : route('admin.pakets.store') }}" method="POST">
                        @csrf
                        @if(isset($paket))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_paket">Nama Paket</label>
                                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ isset($paket) ? $paket->nama_paket : '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga" value="{{ isset($paket) ? $paket->harga : '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ isset($paket) ? $paket->deskripsi : '' }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lama_pengerjaan">Lama Pengerjaan (hari)</label>
                                    <input type="number" name="lama_pengerjaan" class="form-control" id="lama_pengerjaan" value="{{ isset($paket) ? $paket->lama_pengerjaan : '' }}" required>
                                </div>
                            </div>
                            @if(isset($paket))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="0" {{ $paket->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        <option value="1" {{ $paket->status == 1 ? 'selected' : '' }}>Active</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">{{ isset($paket) ? 'Update' : 'Simpan' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
