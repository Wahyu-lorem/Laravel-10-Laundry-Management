<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
    public function index()
    {
        $kupons = Kupon::with('user')->get();
        return view('admin.laporan.kupon', compact('kupons'));
    }

    public function generatePdf()
    {
        $kupons = Kupon::with('user')->get();

        $pdf = new Dompdf();
        $pdf->setOptions(new Options([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            'isRemoteEnabled' => true,
        ]));

        $html = View::make('admin.laporan.kupon_pdf', compact('kupons'))->render();
        $pdf->loadHtml($html);

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->stream('laporan_kupon.pdf');
    }
}
