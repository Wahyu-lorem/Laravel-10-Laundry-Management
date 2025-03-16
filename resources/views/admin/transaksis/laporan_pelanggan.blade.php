@extends('admin.layouts.app')

@section('title', 'Laporan Pelanggan')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <a href="{{ url()->previous() }}" class="text-white">
                        <i class="fa-solid fa-arrow-left fa-lg"></i>
                    </a>
                    <h4 class="mb-0 text-center text-white">Laporan Data Pelanggan</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="ni ni-single-copy-04 text-primary" style="font-size: 4rem;"></i>
                        <p class="mt-2 text-muted">Klik tombol di bawah untuk menghasilkan laporan pelanggan dalam format PDF.</p>
                    </div>
                    <form method="GET" action="{{ route('admin.users.generatePdf') }}" target="_blank">
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary w-auto">
                                <i class="ni ni-cloud-download-95"></i> Generate Laporan PDF
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center text-muted">
                    <small>Pastikan data pelanggan telah diperbarui sebelum menghasilkan laporan.</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
