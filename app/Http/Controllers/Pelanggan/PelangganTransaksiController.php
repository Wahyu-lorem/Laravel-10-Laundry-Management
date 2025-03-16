<?php

namespace App\Http\Controllers\Pelanggan;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PelangganTransaksiController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $transaksis = Transaksi::where('user_id', $user->id)->get();

        return view('pelanggan.riwayat.index', compact('transaksis'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('pelanggan.profile', compact('user'));
    }

    public function invoice($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        $transaksi = Transaksi::findOrFail($id);

        return view('pelanggan.invoice', [
            'transaksi' => $transaksi
        ]);
    }

}

