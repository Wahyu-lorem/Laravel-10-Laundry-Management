@extends('karyawan.layouts.app')

@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h3> <strong> Selamat Datang {{ Auth::user()->name }}!! </strong></h3>
                    <p>Selamat Bekerja</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                   <div class="row">
                      <div class="col-8">
                         <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Pendapatan</p>
                            <h5 class="font-weight-bolder">
                                Rp. {{ number_format(\App\Models\Transaksi::where('status', 4)
                                    ->whereMonth('created_at', now()->month)
                                    ->whereYear('created_at', now()->year)
                                    ->sum('harga'), 0) }}
                            </h5>
                         </div>
                      </div>
                      <div class="col-4 text-end">
                        <div class="icon icon-shape me-3 bg-gradient-dark shadow text-center">
                            <i class="ni ni-money-coins text-white opacity-10"></i>
                        </div>
                      </div>
                   </div>
                </div>
             </div>
         </div>
         <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-body p-3">
                  <div class="row">
                     <div class="col-8">
                        <div class="numbers">
                           <p class="text-sm mb-0 text-uppercase font-weight-bold">Pelanggan</p>
                           <h5 class="font-weight-bolder">
                              {{ \App\Models\User::role('pelanggan')->where('status', 1)->count() }}
                           </h5>
                        </div>
                     </div>
                     <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-dark shadow text-center">
                           <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-body p-3">
                  <div class="row">
                     <div class="col-8">
                       <div class="numbers">
                           <p class="text-sm mb-0 text-uppercase font-weight-bold">Transaksi Selesai</p>
                           <h5 class="font-weight-bolder">
                            {{ \App\Models\Transaksi::where('status', 4)->count() }}
                           </h5>
                           </div>
                     </div>
                     <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-dark shadow text-center">
                           <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
               <div class="card-body p-3">
                  <div class="row">
                     <div class="col-8">
                       <div class="numbers">
                           <p class="text-sm mb-0 text-uppercase font-weight-bold">Transaksi Baru</p>
                           <h5 class="font-weight-bolder">
                            {{ \App\Models\Transaksi::where('status', 0)->count() }}
                           </h5>
                           </div>
                     </div>
                     <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-dark shadow text-center">
                           <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 mb-lg-0 mb-4 mt-4">
    <div class="card z-index-2 h-100">
      <div class="card-body p-3">
        <div id="chart">
            {!! $chart->container() !!}
        </div>
      </div>
    </div>
</div>
<script src="{{ LarapexChart::cdn() }}"></script>
{{ $chart->script() }}
@endsection
