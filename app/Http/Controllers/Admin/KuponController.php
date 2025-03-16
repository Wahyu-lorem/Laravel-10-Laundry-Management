<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KuponController extends Controller
{
    public function index()
    {
        $kupons = Kupon::with('user')->get();

        return view('admin.kupons.index', compact('kupons'));
    }

    public function destroy(Kupon $kupon)
    {
        $kupon->delete();
        Alert::toast('Kupon berhasil dihapus.', 'success');
        return redirect()->route('admin.kupons.index');
    }
}
