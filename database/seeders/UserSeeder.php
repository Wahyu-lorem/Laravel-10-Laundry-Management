<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $pelangganRole = \Spatie\Permission\Models\Role::where('name', 'pelanggan')->first();
        $adminRole = \Spatie\Permission\Models\Role::where('name', 'admin')->first();
        $karyawanRole = \Spatie\Permission\Models\Role::where('name', 'karyawan')->first();

        $adminName = 'Admin';
        User::create([
            'name' => $adminName,
            'email' => strtolower($adminName) . '@gmail.com',
            'password' => Hash::make('admin123'),
            'alamat' => 'kota baru',
            'telepon' => '081234567890',
            'status' => 1,
        ])->assignRole($adminRole);

        $karyawanName = 'Karyawan';
        User::create([
            'name' => $karyawanName,
            'email' => strtolower($karyawanName) . '@gmail.com',
            'password' => Hash::make('karyawan123'),
            'alamat' => 'tugu juang',
            'telepon' => '081234567890',
            'status' => 1,
        ])->assignRole($karyawanRole);

        $pelangganName = 'aries aditia';
        User::create([
            'name' => $pelangganName,
            'email' => strtolower(str_replace(' ', '.', $pelangganName)) . '@gmail.com',
            'password' => Hash::make('pelanggan123'),
            'alamat' => 'jeramba bolong',
            'telepon' => '081234567890',
            'status' => 1,
        ])->assignRole($pelangganRole);

        foreach (range(1, 50) as $index) {
            $name = $faker->name();
            User::create([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@gmail.com',
                'password' => Hash::make('pelanggan123'),
                'telepon' => '081234567890',
                'alamat' => $faker->address(),
                'status' => 1,
            ])->assignRole($pelangganRole);
        }
    }
}
