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
            'email' => 'siswa1@email.com',
            'password' => Hash::make('siswa1'),
            'role_id' => 3,  // ID untuk role student
        ]);

        // Membuat data siswa yang terhubung dengan user
        Student::create([
            'user_id' => $user->id,
            'nis' => '30686',
            'name' => 'I Made Dio Kartiana Putra',
            'kelas' => 'XII RPL 3',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'email' => 'dioputra1423@gmail.com',
        ]);
    }
}