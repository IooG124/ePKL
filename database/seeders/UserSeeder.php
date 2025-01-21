<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Pastikan ada role 'admin' di tabel roles
        $roleAdmin = Role::firstOrCreate(['role_name' => 'admin']);
        
        // Buat user dengan role admin
        User::create([
            'username' => 'admin', // Username admin
            'password' => '1234', // Password admin
            'role_id' => $roleAdmin->id, // Menghubungkan dengan role admin
        ]);
    }
}


