<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kupon;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminHome(LarapexChart $chart)
    {
        $transaksiData = Transaksi::where('tanggal', '>=', now()->subMonth())
        ->selectRaw('DATE(tanggal) as date, COUNT(*) as count')
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    $dates = $transaksiData->pluck('date')->toArray();
    $counts = $transaksiData->pluck('count')->toArray();

    $chart = $chart->lineChart()
        ->setTitle('Jumlah Transaksi dalam Sebulan Terakhir')
        ->setLabels($dates)
        ->setDataset([
            [
                'name' => 'Jumlah Transaksi',
                'data' => $counts,
            ]
        ]);

    return view('admin.home', [
        'chart' => $chart
    ]);
    }

    public function karyawanHome(LarapexChart $chart)
    {
        $transaksiData = Transaksi::where('tanggal', '>=', now()->subMonth())
        ->selectRaw('DATE(tanggal) as date, COUNT(*) as count')
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    $dates = $transaksiData->pluck('date')->toArray();
    $counts = $transaksiData->pluck('count')->toArray();

    $chart = $chart->lineChart()
        ->setTitle('Jumlah Transaksi dalam Sebulan Terakhir')
        ->setLabels($dates)
        ->setDataset([
            [
                'name' => 'Jumlah Transaksi',
                'data' => $counts,
            ]
        ]);

    return view('karyawan.home', [
        'chart' => $chart
    ]);
    }

    public function pelangganHome()
    {

        $user = Auth::user();
        $jumlahKupon = Kupon::where('user_id', $user->id)
        ->where('berlaku_hingga', '>=', now())
        ->count();

        $totalTransaksi = Transaksi::where('user_id', $user->id)->count();

        $jumlahTransaksi = $totalTransaksi % 10;

        return view('pelanggan.home', compact('jumlahKupon', 'jumlahTransaksi'));
    }
}
