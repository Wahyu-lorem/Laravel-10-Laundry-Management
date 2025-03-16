<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::with('user')->get(); 
        return view('admin.pesan.index', compact('pesans'));
    }

    public function show(Pesan $pesan)
    {
        return view('admin.pesan.show', compact('pesan'));
    }
}
