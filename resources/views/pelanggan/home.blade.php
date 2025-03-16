@extends('pelanggan.layouts.app')

@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <marquee behavior="scroll" direction="left" scrollamount="6" class="mb-3 text-primary">
                        <strong>🎉 Diskon Spesial: Dapatkan potongan 50% untuk setiap 10 transaksi!</strong>
                    </marquee>
                    <div class="d-flex align-items-start mb-4">
                        <div class="flex-grow-1">
                            <div class="alert alert-light border-primary" role="alert">
                                <h4 class="alert-heading text-primary">Selamat Datang di Laundry Kami <span class="text-dark"> {{ Auth::user()->name }} </span></h4>
                                <p>Kami sangat senang menyambut Anda di Laundry Al-Farizi, tempat di mana kualitas layanan dan kepuasan pelanggan adalah prioritas utama kami. Di sini, kami berkomitmen untuk memberikan layanan laundry yang terbaik dengan harga yang sangat kompetitif. Tim profesional kami siap melayani Anda dengan dedikasi dan perhatian penuh.</p>
                                <hr>
                                <p class="mb-0">Jika Anda memerlukan informasi lebih lanjut tentang layanan kami, atau jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami di nomor telepon 123-456-7890. Kami juga mengundang Anda untuk mengunjungi outlet.</p>
                                <p class="mb-0">Terima kasih telah memilih Laundry Al-Farizi. Kami menantikan kunjungan Anda dan berharap dapat melayani Anda dengan layanan laundry yang tak tertandingi.</p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ms-4">
                            <img src="/dist/assets/img/fitur2.jpg" alt="logo" class="img-fluid" style="max-width: 340px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0.2,0.3);">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div>
                                <h5 class="text-primary">Informasi:</h5>
                                <ul class="list-unstyled">
                                    <li><strong>Alamat:</strong> Jl. Dr. Sumbiyono, Kebun Handil, Kec. Jelutung, Kota Jambi, Jambi 36124</li>
                                    <li><strong>Jam Operasional:</strong> Senin - Sabtu, 08:00 - 20:00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-background card-background-mask-info h-100">
                                <div class="full-background" style="background-image: url('{{ asset('/dist/assets/img/img-1-1200x1000.jpg') }}'); background-size: cover;"></div>
                                <div class="card-body pt-4 text-center">
                                    @if($jumlahKupon > 0)
                                        <h6 class="text-white mb-0">Jumlah Transaksi Anda</h6>
                                        <h3 class="badge d-block bg-gradient-dark mb-2">{{ $jumlahTransaksi }} Transaksi</h3>
                                        <h6 class="text-white mb-0">Jumlah Kupon Anda</h6>
                                        <h3 id="jumlahKupon" class="badge d-block bg-gradient-dark mb-2">{{ $jumlahKupon }} Kupon</h3>
                                        <p class="text-white">Gunakan kupon Anda untuk mendapatkan diskon spesial!</p>
                                    @else
                                    <h6 class="text-white mb-0">Jumlah Transaksi Anda</h6>
                                    <h3 class="badge d-block bg-gradient-dark mb-2">{{ $jumlahTransaksi }} Transaksi</h3>
                                        <h4 class="text-white">kumpulkan 10 transaksi untuk mendapatkan 1 kupon</h4>
                                        <p class="badge d-block bg-gradient-dark mb-2">Anda tidak memiliki kupon diskon saat ini</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <p class="text-muted">Follow us on social media for the latest updates and promotions!</p>
                        <a href="#" class="text-primary me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-primary me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-primary"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
