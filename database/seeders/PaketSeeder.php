<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    public function run()
    {
        $pakets = [
            ['nama_paket' => 'Cuci Komplit', 'harga' => 6000, 'deskripsi' => 'Cuci dan setrika pakaian minimal 2 kg', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Cuci Komplit', 'harga' => 7000, 'deskripsi' => 'Cuci dan setrika pakaian minimal 2 kg', 'lama_pengerjaan' => 3],
            ['nama_paket' => 'Cuci Komplit', 'harga' => 8000, 'deskripsi' => 'Cuci dan setrika pakaian minimal 2 kg', 'lama_pengerjaan' => 2],
            ['nama_paket' => 'Cuci Komplit', 'harga' => 10000, 'deskripsi' => 'Cuci dan setrika pakaian minimal 2 kg (Ekspres)', 'lama_pengerjaan' => 1],
            ['nama_paket' => 'Cuci Komplit', 'harga' => 13000, 'deskripsi' => 'Cuci dan setrika pakaian minimal 2 kg (Ekspres Kilat)', 'lama_pengerjaan' => 1],
            ['nama_paket' => 'Setrika Saja', 'harga' => 4000, 'deskripsi' => 'Setrika pakaian saja minimal 4 kg', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Setrika Saja', 'harga' => 4500, 'deskripsi' => 'Setrika pakaian saja minimal 4 kg', 'lama_pengerjaan' => 3],
            ['nama_paket' => 'Setrika Saja', 'harga' => 5000, 'deskripsi' => 'Setrika pakaian saja minimal 4 kg', 'lama_pengerjaan' => 2],
            ['nama_paket' => 'Setrika Saja', 'harga' => 5500, 'deskripsi' => 'Setrika pakaian saja minimal 4 kg', 'lama_pengerjaan' => 1],
            ['nama_paket' => 'Bedcover', 'harga' => 25000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Bedcover', 'harga' => 21000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Bedcover', 'harga' => 18000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Selimut', 'harga' => 23000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Selimut', 'harga' => 28000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Selimut', 'harga' => 13000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Sprei', 'harga' => 18000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Sprei', 'harga' => 16000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Sprei', 'harga' => 13000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Sepatu/Sandal', 'harga' => 30000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Sepatu/Sandal', 'harga' => 25000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Sepatu/Sandal', 'harga' => 20000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Sepatu/Sandal', 'harga' => 15000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Topi', 'harga' => 6000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 4],
            ['nama_paket' => 'Boneka', 'harga' => 55000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
            ['nama_paket' => 'Boneka', 'harga' => 45000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
            ['nama_paket' => 'Boneka', 'harga' => 35000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
            ['nama_paket' => 'Boneka', 'harga' => 25000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
            ['nama_paket' => 'Bantal/Guling', 'harga' => 25000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
            ['nama_paket' => 'Bantal/Guling', 'harga' => 20000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
            ['nama_paket' => 'Kasur Busa', 'harga' => 50000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
            ['nama_paket' => 'Kasur Busa', 'harga' => 40000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
            ['nama_paket' => 'Karpet', 'harga' => 100000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
            ['nama_paket' => 'Karpet', 'harga' => 90000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
            ['nama_paket' => 'Karpet', 'harga' => 80000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
            ['nama_paket' => 'Karpet', 'harga' => 70000, 'deskripsi' => 'Harga satuan lihat ukuran', 'lama_pengerjaan' => 7],
        ];

        foreach ($pakets as $paket) {
            DB::table('pakets')->insert([
                'nama_paket' => $paket['nama_paket'],
                'harga' => $paket['harga'],
                'deskripsi' => $paket['deskripsi'],
                'lama_pengerjaan' => $paket['lama_pengerjaan'],
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
