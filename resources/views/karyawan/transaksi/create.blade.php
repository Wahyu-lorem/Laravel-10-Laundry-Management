@extends('karyawan.layouts.app')
@section('title', 'Tambah Transaksi')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{ url()->previous() }}" class="text-dark">
                <i class="fa-solid fa-arrow-left fa-lg"></i>
            </a>
        </div>
        <h3 class="text-center mb-3">Tambah Transaksi</h3>
        <div class="card-body">
            <form action="{{ route('karyawan.transaksi.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="invoice">Invoice</label>
                            <input type="text" class="form-control" id="invoice" name="invoice" value="{{ $invoice }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_id" class="form-label">Pelanggan</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="">Pilih Pelanggan</option>
                                @foreach($pelanggan as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->telepon }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paket">Paket</label>
                            <select class="form-control" id="paket" name="paket" required>
                                @foreach($pakets as $paket)
                                    <option value="{{ $paket->id }}" data-price="{{ $paket->harga }}" data-hari="{{ $paket->lama_pengerjaan }}">
                                        {{ $paket->nama_paket }} - {{ $paket->lama_pengerjaan }} hari
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kilogram">Kilogram</label>
                            <input type="number" class="form-control" id="kilogram" name="kilogram" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_kupon">Kode Kupon (Opsional)</label>
                            <select class="form-control" id="kode_kupon" name="kode_kupon">
                                <option value="" selected>Pilih Kupon</option>
                                @foreach($kupons as $kupon)
                                    <option value="{{ $kupon->kode }}" data-discount="{{ $kupon->diskon }}" data-user-id="{{ $kupon->user_id }}">
                                        {{ $kupon->kode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dp">DP (Pembayaran Awal)</label>
                            <input type="number" class="form-control" id="dp" name="dp" placeholder="Masukkan jumlah DP" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sisa">Sisa Pembayaran</label>
                            <input type="text" class="form-control" id="sisa" name="sisa" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="d-flex flex-column align-items-center">
                            <label for="harga" class="mb-1">Harga</label>
                            <input type="text" class="form-control text-center" id="harga" name="harga" readonly>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary position-absolute bottom-3 end-5" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                    Tambah Pelanggan
                </button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white" id="addCustomerModalLabel">Tambah Pelanggan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCustomerForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama pelanggan" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email pelanggan" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat pelanggan">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#addCustomerForm').on('submit', function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '{{ route("karyawan.pelanggan.store") }}',
                data: formData,
                success: function(response) {
                    $('#addCustomerModal').modal('hide');

                    $('#user_id').append(new Option(response.name + ' (' + response.telepon + ')', response.id, true, true));

                    $('#addCustomerForm')[0].reset();
                },
                error: function(response) {
                    alert('Terjadi kesalahan, silakan coba lagi.');
                }
            });
        });

        function calculatePrice() {
            var paketPrice = parseFloat($('#paket option:selected').data('price')) || 0;
            var kilogram = parseFloat($('#kilogram').val()) || 0;
            var discount = parseFloat($('#kode_kupon option:selected').data('discount')) || 0;
            var dp = parseFloat($('#dp').val()) || 0;

            var totalPrice = paketPrice * kilogram;
            var discountedPrice = totalPrice - (totalPrice * discount / 100);
            var remainingPrice = discountedPrice - dp;

            $('#harga').val(discountedPrice.toFixed(0));
            $('#sisa').val(remainingPrice.toFixed(0));
        }

        $('#paket, #kilogram, #kode_kupon, #dp').change(calculatePrice);

    });
</script>

@endsection
