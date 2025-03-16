@extends('admin.layouts.app')

@section('title', 'Laporan')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary text-white">
                    <a href="{{ url()->previous() }}" class="text-white">
                        <i class="fa-solid fa-arrow-left fa-lg"></i>
                    </a>
                    <h3 class="text-center text-white">LAPORAN DATA TRANSAKSI</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.transaksi.generateLaporan') }}" target="_blank">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Tanggal Mulai (Opsional)</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">Tanggal Akhir (Opsional)</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control text-center" id="status" name="status">
                                        <option value="">Pilih Status</option>
                                        <option value="0">Baru</option>
                                        <option value="1">Diterima</option>
                                        <option value="2">Laundry</option>
                                        <option value="3">Selesai</option>
                                        <option value="4">Diambil</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Buat Laporan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
