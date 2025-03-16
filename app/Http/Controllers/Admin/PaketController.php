<?php

namespace App\Http\Controllers\Admin;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = Paket::orderBy('id', 'ASC');

        if ($search !== null) {
            $query->where('nama_paket', 'like', '%' . $search . '%');
        }

        $pakets = $query->paginate(10);

        return view('admin.pakets.index', compact('pakets'));
    }

    public function create()
    {
        return view('admin.pakets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'lama_pengerjaan' => 'required|integer|min:1',
        ]);

        Paket::create([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'lama_pengerjaan' => $request->lama_pengerjaan,
            'status' => 0,
        ]);

        Alert::toast('Paket berhasil ditambahkan.', 'success');
        return redirect()->route('admin.pakets.index');
    }

    public function show(Paket $paket)
    {
        return view('admin.pakets.show', compact('paket'));
    }

    public function edit(Paket $paket)
    {
        return view('admin.pakets.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:0,1',
            'lama_pengerjaan' => 'required|integer|min:1',
        ]);

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'lama_pengerjaan' => $request->lama_pengerjaan,
        ]);

        Alert::toast('Paket berhasil diperbarui.', 'success');
        return redirect()->route('admin.pakets.index');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();
        Alert::toast('Paket berhasil dihapus.', 'success');
        return redirect()->route('admin.pakets.index');
    }

    public function activate(Paket $paket)
    {
        $paket->update(['status' => 1]);
        Alert::toast('Paket berhasil diaktifkan.', 'success');
        return redirect()->route('admin.pakets.index');
    }

    public function deactivate(Paket $paket)
    {
        $paket->update(['status' => 0]);
        Alert::toast('Paket berhasil dinonaktifkan.', 'success');
        return redirect()->route('admin.pakets.index');
    }

}
