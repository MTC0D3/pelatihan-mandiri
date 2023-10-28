<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nik' => '3271011111111111',
            'name' => 'Administrator',
            'nip' => '11111',
            'agency' => 'BBPKH CINAGARA',
            'position' => 'Admin',
            'agency_address' => 'jalan Snakma Cisalopa Desa Pasirbuncir Kec Caringin Kab Bogor POBOX 05/Cgb Bogor 16740',
            'birthplace' => 'Bogor',
            'birthdate' => '2001-01-01',
            'phone' => '080808080808',
            'email' => 'admin@gmail.com',
            'address' => 'jalan Snakma Cisalopa Desa Pasirbuncir Kec Caringin Kab Bogor POBOX 05/Cgb Bogor 16740',
            'password' => bcrypt('Admin12345'),
        ]);

        $role = Role::find(1);

        $user->assignRole($role);
    }
}