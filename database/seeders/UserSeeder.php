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
            'name' => 'Taofik',
            'username' => 'admin',
            'nik' => '3271010205010006',
            'email' => 'taofik.code@gmail.com',
            'password' => bcrypt('Taofik020501')
        ]);

        $role = Role::find(1);

        $user->assignRole($role);
    }
}