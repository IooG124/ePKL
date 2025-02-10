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
            'password' => Hash::make('passwordguru1'),
            'role_id' => 2,  // ID untuk role teacher
        ]);

        // Membuat data guru yang terhubung dengan user
        Teacher::create([
            'user_id' => $user->id,
            'username' => 'guru1',
            'nama' => 'Guru Satu',
            'nip' => '987654321',
            'alamat' => 'Jl. Pendidikan No. 1',
            'telepon' => '081234567890',
        ]);
    }
}