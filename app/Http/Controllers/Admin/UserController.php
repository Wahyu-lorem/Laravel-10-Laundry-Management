<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function listKaryawan()
    {
        $karyawans = User::role('karyawan')->get();
        return view('admin.users.karyawan', compact('karyawans'));
    }

    public function listPelanggan(Request $request)
    {
        $search = $request->get('search');
        $query = User::role('pelanggan');

        if ($search !== null) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $pelanggans = $query->paginate(10);

        return view('admin.users.pelanggan', compact('pelanggans'));
    }

    public function activate(User $user)
    {
        $user->update(['status' => 1]);
        Alert::toast('Pengguna berhasil diAktifkan.', 'success');
        return redirect()->back();
    }

    public function deactivate(User $user)
    {
        $user->update(['status' => 0]);
        Alert::toast('Pengguna berhasil dinonaktifkan.', 'success');
        return redirect()->back();
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'role' => 'required|string|in:pelanggan,karyawan',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'telepon' => $validated['telepon'],
                'alamat' => $validated['alamat'],
                'password' => Hash::make($validated['password']),
            ]);

            $user->assignRole($validated['role']);

            Alert::toast('User berhasil ditambahkan.', 'success');

            if ($validated['role'] == 'pelanggan') {
                return redirect()->route('admin.pelanggan.index');
            } elseif ($validated['role'] == 'karyawan') {
                return redirect()->route('admin.karyawan.index');
            }

        } catch (\Exception $e) {
            Alert::error('Error', 'User gagal ditambahkan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        try {
            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'telepon' => $validated['telepon'],
                'alamat' => $validated['alamat'],
                'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
            ]);

            Alert::toast('User berhasil diperbarui.', 'success');

            if ($user->hasRole('pelanggan')) {
                return redirect()->route('admin.pelanggan.index');
            } elseif ($user->hasRole('karyawan')) {
                return redirect()->route('admin.karyawan.index');
            }

        } catch (\Exception $e) {
            Alert::error('Error', 'User gagal diperbarui: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function storePelanggan(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        try {
            $userData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'telepon' => $validated['telepon'],
                'alamat' => $validated['alamat'],
                'status' => 1,
                'password' => Hash::make($request->password ?: 'pelanggan123'),
            ];

            $user = User::create($userData);

            $role = Role::findByName('pelanggan');
            $user->assignRole($role);

            $message = "Halo, {$user->name}. Akun Anda telah dibuat.\nEmail: {$user->email}\nPassword: " . ($request->password ?: 'pelanggan123') . "\nSilakan login untuk melihat informasi laundry anda.";
            $this->sendWhatsAppMessage($user->telepon, $message);

            Alert::toast('Pelanggan berhasil ditambahkan.', 'success');

            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'telepon' => $user->telepon
            ]);

        } catch (\Exception $e) {
            Alert::error('Error', 'Pelanggan gagal ditambahkan: ' . $e->getMessage());
            return response()->json(['error' => 'Pelanggan gagal ditambahkan.'], 500);
        }
    }


    public function sendWhatsAppMessage($phoneNumber, $message)
    {
        $apiKey = '#';
        $url = 'https://api.fonnte.com/send';

        $postData = [
            'target' => $phoneNumber,
            'message' => $message,
            'countryCode' => '62',
        ];

        $headers = [
            'Authorization: ' . $apiKey,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function generatePdf()
    {
        $pelanggans = User::role('pelanggan')->get();

        $pdf = new Dompdf();
        $pdf->setOptions(new Options([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            'isRemoteEnabled' => true,
        ]));

        $html = View::make('admin.users.pdf', compact('pelanggans'))->render();
        $pdf->loadHtml($html);

        $pdf->setPaper('A4', 'landscape');

        $pdf->render();

        return $pdf->stream('laporan_pelanggan.pdf');
    }


}
