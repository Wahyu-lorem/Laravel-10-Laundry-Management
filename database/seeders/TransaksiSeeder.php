<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kupon;
use App\Models\Paket;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    private static $invoiceCounter = 1;

    public function run()
    {
        $faker = Faker::create('id_ID');
        $pakets = Paket::all();
        $users = User::whereHas('roles', function($query) {
            $query->where('name', 'pelanggan');
        })->get();

        DB::table('transaksis')->truncate();
        DB::table('kupons')->truncate();

        $startDate = Carbon::now()->subMonths(2);
        $endDate = Carbon::now();

        $dates = collect();
        for ($date = $startDate->copy(); $date <= $endDate; $date->addDay()) {
            $dates->push($date->format('Y-m-d'));
        }

        $totalTransactions = 0;
        $transactionLimit = 150;

        $usersWith10Transactions = $users->random(4);
        foreach ($usersWith10Transactions as $user) {
            for ($i = 0; $i < 10; $i++) {
                if ($totalTransactions >= $transactionLimit) {
                    break 2;
                }

                $invoice = 'TRC-' . str_pad(self::$invoiceCounter, 3, '0', STR_PAD_LEFT);
                self::$invoiceCounter++;

                $selectedPaket = $pakets->random();
                $pricePerKg = $selectedPaket->harga;
                $kilogram = $faker->numberBetween(1, 10);
                $totalPrice = round($pricePerKg * $kilogram);

                $dp = round($totalPrice / 2);
                $sisa = round($totalPrice - $dp);

                if ($dp > $totalPrice) {
                    $dp = $totalPrice;
                    $sisa = 0;
                }

                DB::table('transaksis')->insert([
                    'invoice' => $invoice,
                    'paket' => $selectedPaket->nama_paket,
                    'hari' => $selectedPaket->lama_pengerjaan,
                    'tanggal' => $dates->random(),
                    'kilogram' => $kilogram,
                    'harga' => $totalPrice,
                    'dp' => $dp,
                    'sisa' => $sisa,
                    'status' => 4,
                    'user_id' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $totalTransactions++;
            }

            Kupon::create([
                'user_id' => $user->id,
                'kode' => 'KUPON-' . strtoupper(Str::random(6)),
                'diskon' => 20,
                'berlaku_hingga' => now()->addMonths(1),
            ]);
        }

        $remainingUsers = $users->diff($usersWith10Transactions);
        foreach ($remainingUsers as $user) {
            $transactionCount = $faker->numberBetween(1, 3);

            for ($i = 0; $i < $transactionCount; $i++) {
                if ($totalTransactions >= $transactionLimit) {
                    break 2;
                }

                $invoice = 'TRC-' . str_pad(self::$invoiceCounter, 3, '0', STR_PAD_LEFT);
                self::$invoiceCounter++;

                $selectedPaket = $pakets->random();
                $pricePerKg = $selectedPaket->harga;
                $kilogram = $faker->numberBetween(1, 10);
                $totalPrice = round($pricePerKg * $kilogram);

                $dp = round($totalPrice / 2);
                $sisa = round($totalPrice - $dp);

                if ($dp > $totalPrice) {
                    $dp = $totalPrice;
                    $sisa = 0;
                }

                DB::table('transaksis')->insert([
                    'invoice' => $invoice,
                    'paket' => $selectedPaket->nama_paket,
                    'hari' => $selectedPaket->lama_pengerjaan,
                    'tanggal' => $dates->random(),
                    'kilogram' => $kilogram,
                    'harga' => $totalPrice,
                    'dp' => $dp,
                    'sisa' => $sisa,
                    'status' => 4,
                    'user_id' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $totalTransactions++;
            }
        }
    }
}
