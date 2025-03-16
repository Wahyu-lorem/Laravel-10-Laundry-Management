<?php

namespace App\Http\Controllers\Pelanggan;

use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganPesanController extends Controller
{

    public function index()
    {
        $pesans = Pesan::where('user_id', auth()->id())->get();
        return view('pelanggan.pesan.index', compact('pesans'));
    }
    
    public function create()
    {
        return view('pelanggan.pesan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesan' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'saran' => 'nullable|string',
        ]);

        Pesan::create([
            'user_id' => auth()->id(),
            'pesan' => $request->input('pesan'),
            'rating' => $request->input('rating'),
            'saran' => $request->input('saran'),
        ]);
        Alert::toast('Pesan Berhasil dikirim.', 'success');
        return redirect()->route('pelanggan.pesan.create')->with('success', 'Pesan berhasil dikirim.');
    }
}
