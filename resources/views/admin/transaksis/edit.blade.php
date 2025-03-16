@extends('admin.layouts.app')


@section('content')
<div class="container">
    <a href="{{ url()->previous() }}" class="text-dark">
        <i class="fa-solid fa-arrow-left fa-lg"></i>
    </a>
    <h1>Edit Transaksi</h1>
    <form action="{{ route('transaksis.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="invoice">Invoice</label>
            <input type="text" class="form-control" id="invoice" name="invoice" value="{{ $transaksi->invoice }}" required>
        </div>
        <div class="form-group">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{ $transaksi->nama_pelanggan }}" required>
        </div>
        <div class="form-group">
            <label for="telepon_pelanggan">Telepon Pelanggan</label>
            <input type="text" class="form-control" id="telepon_pelanggan" name="telepon_pelanggan" value="{{ $transaksi->telepon_pelanggan }}" required>
        </div>
        <div class="form-group">
            <label for="paket">Paket</label>
            <input type="text" class="form-control" id="paket" name="paket" value="{{ $transaksi->paket }}" required>
        </div>
        <div class="form-group">
            <label for="hari">Hari</label>
            <input type="text" class="form-control" id="hari" name="hari" value="{{ $transaksi->hari }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $transaksi->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="kilogram">Kilogram</label>
            <input type="number" class="form-control" id="kilogram" name="kilogram" value="{{ $transaksi->kilogram }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $transaksi->harga }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="0" {{ $transaksi->status == 0 ? 'selected' : '' }}>New</option>
                <option value="1" {{ $transaksi->status == 1 ? 'selected' : '' }}>Accept</option>
                <option value="2" {{ $transaksi->status == 2 ? 'selected' : '' }}>Laundry</option>
                <option value="3" {{ $transaksi->status == 3 ? 'selected' : '' }}>Complete</option>
                <option value="4" {{ $transaksi->status == 4 ? 'selected' : '' }}>Retrieved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
