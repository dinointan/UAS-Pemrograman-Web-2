<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserPermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserPermissionSeeder::class);
        // User::factory(10)->create();

        $petugas = User::create([
            'name' => 'petugas',
            'email' => 'petugas@mail.com',
            'password' => bcrypt('petugas123'),
            // 'role' => 'petugas',
        ]);
        $petugas->assignRole('petugas');

        $pasien = User::create([
            'name' => 'pasien',
            'email' => 'pasien@mail.com',
            'password' => bcrypt('pasien123'),
            // 'role' => 'pasien',
        ]);
        $pasien->assignRole('pasien');

        $dokter = User::create([
            'name' => 'dokter',
            'email' => 'dokter@mail.com',
            'password' => bcrypt('dokter123'),
            // 'role' => 'dokter',
        ]);
        $dokter->assignRole('dokter');
    }
}
