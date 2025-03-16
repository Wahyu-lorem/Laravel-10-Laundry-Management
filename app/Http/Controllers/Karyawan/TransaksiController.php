<?php

namespace App\Http\Controllers\Karyawan;


use App\Models\User;
use App\Models\Kupon;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\TransaksiSelesaiNotification;

class TransaksiController extends Controller
{

    private $fonnteToken = "#";

    public function index(Request $request)
    {
        $status = $request->get('status');
        $search = $request->get('search');
        $query = Transaksi::with('user')->latest('id');

        if ($status !== null) {
            $query->where('status', $status);
        }

        if ($search !== null) {
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $transaksis = $query->paginate(10);

        return view('karyawan.transaksi.index', compact('transaksis', 'status', 'search'));
    }

    public function create()
    {
        $pakets = Paket::where('status', 1)->get();
        $pelanggan = User::role('pelanggan')->where('status', 1)->get();
        $latest = Transaksi::latest('created_at')->first();

        $newInvoiceNumber = $latest ? str_pad(intval(substr($latest->invoice, 4)) + 1, 3, '0', STR_PAD_LEFT) : '001';
        $invoice = 'TRC-' . $newInvoiceNumber;

        $kupons = Kupon::where('berlaku_hingga', '>=', now())->get();

        return view('karyawan.transaksi.create', compact('pakets', 'pelanggan', 'invoice', 'kupons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'paket' => 'required|exists:pakets,id',
            'tanggal' => 'required|date',
            'kilogram' => 'required|numeric|min:0',
            'dp' => 'nullable|numeric|min:0',
            'kode_kupon' => 'nullable|string|exists:kupons,kode',
        ]);

        $paket = Paket::findOrFail($request->paket);
        $user = User::findOrFail($request->user_id);

        $latest = Transaksi::latest('invoice')->first();
        $newInvoiceNumber = $latest ? str_pad(intval(substr($latest->invoice, 4)) + 1, 3, '0', STR_PAD_LEFT) : '001';
        $invoice = 'TRC-' . $newInvoiceNumber;

        $pricePerKg = $paket->harga;
        $totalPrice = $pricePerKg * $request->kilogram;

        if ($request->kode_kupon) {
            $kupon = Kupon::where('kode', $request->kode_kupon)->first();

            if ($kupon) {
                if ($kupon->berlaku_hingga >= now()) {
                    $diskon = $kupon->diskon;
                    $totalPrice -= $totalPrice * ($diskon / 100);
                    $kupon->delete();
                } else {
                    Alert::toast('Kupon sudah kadaluarsa.', 'error');
                    return redirect()->back();
                }
            } else {
                Alert::toast('Kupon tidak valid.', 'error');
                return redirect()->back();
            }
        }

        $dp = $request->dp ?? 0;
        $sisaPembayaran = max(0, $totalPrice - $dp);

        Transaksi::create([
            'invoice' => $invoice,
            'user_id' => $user->id,
            'paket' => $paket->nama_paket,
            'hari' => $paket->lama_pengerjaan,
            'tanggal' => $request->tanggal,
            'kilogram' => $request->kilogram,
            'harga' => $totalPrice,
            'dp' => $dp,
            'sisa' => $sisaPembayaran,
            'status' => 0,
        ]);

        $transaksiCount = Transaksi::where('user_id', $user->id)->count();
        if ($transaksiCount % 10 == 0) {
            $existingCoupons = Kupon::where('user_id', $user->id)->count();

            if ($existingCoupons == 0) {
                Kupon::create([
                    'user_id' => $user->id,
                    'kode' => 'KUPON-' . strtoupper(Str::random(6)),
                    'diskon' => 50,
                    'berlaku_hingga' => now()->addMonths(1),
                ]);
            }
        }

        Alert::toast('Transaksi berhasil ditambahkan.', 'success');
        return redirect()->route('karyawan.transaksi.index');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        Alert::toast('Transaksi berhasil dihapus.', 'success');

        return redirect()->route('karyawan.transaksi.index');
    }

    public function sendWhatsAppMessage($userId, $message)
    {
        $user = User::find($userId);

        if (!$user) {
            Log::error('User not found: ' . $userId);
            return;
        }

        $phoneNumber = $user->telepon;

        if (!$phoneNumber) {
            Log::error('Phone number not found for user: ' . $userId);
            return;
        }

        $postData = json_encode([
            'target' => $phoneNumber,
            'message' => $message,
            'countryCode' => '62',
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => [
                "Authorization: $this->fonnteToken",
                "Content-Type: application/json"
            ],
        ]);

        $response = curl_exec($curl);

        if ($response === false) {
            Log::error('Error sending WhatsApp message: ' . curl_error($curl));
        }

        curl_close($curl);
    }

    public function updateStatus(Request $request, $id, $status)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = $status;
        $transaksi->save();

        if ($transaksi->status == 3) {
            $transaksi->user->notify(new TransaksiSelesaiNotification($transaksi));
            $message = "Halo " . strtoupper($transaksi->user->name) . ", cucian Anda dengan Invoice " . $transaksi->invoice . " sudah selesai. Silakan ambil cucian Anda.";
            $this->sendWhatsAppMessage($transaksi->user->id, $message);
        }

        Alert::toast('Status transaksi berhasil diperbarui.', 'success');

        return redirect()->route('karyawan.transaksi.index');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('karyawan.profile', compact('user'));
    }

    public function kupon()
    {
        $kupons = Kupon::with('user')->get();

        return view('karyawan.kupons.index', compact('kupons'));
    }

    public function print($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('karyawan.transaksi.struk', compact('transaksi'));
    }
}
