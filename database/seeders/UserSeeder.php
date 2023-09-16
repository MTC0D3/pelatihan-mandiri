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
            'nik' => '3271010205010006',
            'name' => 'Taofik',
            'nip' => '11111111',
            'agency' => 'PT. Aman',
            'position' => 'Admin',
            'agency_address' => 'Kp. MargaBhakti',
            'birthplace' => 'Bogor',
            'birthdate' => '2001-05-02',
            'phone' => '0895384276276',
            'email' => 'taofik.code@gmail.com',
            'address' => 'Bogor',
            'password' => bcrypt('Taofik020501'),
        ]);

        $role = Role::find(1);

        $user->assignRole($role);
    }
}