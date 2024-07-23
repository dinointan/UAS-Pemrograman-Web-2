<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'petugas-access']);
        Permission::create(['name' => 'pasien-access']);
        Permission::create(['name' => 'dokter-access']);


        $petugas_role = Role::create(['name' => 'petugas']);
        $petugas_role->givePermissionTo('petugas-access');

        $pasien_role = Role::create(['name' => 'pasien']);
        $pasien_role->givePermissionTo('pasien-access');

        $dokter_role = Role::create(['name' => 'dokter']);
        $dokter_role->givePermissionTo('dokter-access');

    }
}
