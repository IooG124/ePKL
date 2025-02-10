<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Membuat data user siswa dengan username
        $user = User::create([
            'username' => 'siswa1',  // Tambahkan username
            'email' => 'siswa1@example.com',
            'password' => Hash::make('passwordsiswa1'),
            'role_id' => 3,  // ID untuk role student
        ]);

        // Membuat data siswa yang terhubung dengan user
        Student::create([
            'user_id' => $user->id,
            'nis' => '12345',
            'name' => 'Siswa Satu',
            'kelas' => '12A',
            'jurusan' => 'IPA',
            'email' => 'siswa1@example.com',
        ]);
    }
}