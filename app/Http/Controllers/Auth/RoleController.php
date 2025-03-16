<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (auth()->user()->hasRole(['admin'])) {
            return redirect('admin/home');
        } elseif (auth()->user()->hasRole(['karyawan'])) {
            return redirect('karyawan/home');
        } elseif (auth()->user()->hasRole(['pelanggan'])) {
            return redirect('pelanggan/home');
        } else {
            return redirect('/');
        }
    }
}
