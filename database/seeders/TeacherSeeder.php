<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        // Membuat data user guru dengan username
        $user = User::create([
            'username' => 'guru1',  // Tambahkan username
            'password' => Hash::make('guru1'),
            'role_id' => 2,  // ID untuk role teacher
        ]);

        // Membuat data guru yang terhubung dengan user
        Teacher::create([
            'user_id' => $user->id,
            'username' => 'guru1',
            'name' => 'Ni Erawitiwi, S.Pd.',
            'nip' => '0987654321',
            'alamat' => 'Jl. HOS Cokroaminoto No 141',
            'telepon' => '081234567890',
        ]);
    }
}