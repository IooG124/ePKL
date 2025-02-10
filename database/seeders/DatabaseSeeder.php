<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Membuat role hanya jika belum ada
    $roleAdmin = Role::firstOrCreate(['role_name' => 'admin']);
    $roleTeacher = Role::firstOrCreate(['role_name' => 'teachers']);
    $roleStudent = Role::firstOrCreate(['role_name' => 'students']);

    // Membuat user admin hanya jika belum ada
    User::firstOrCreate(
        ['username' => 'admin'],
        [
            'password' => Hash::make('1234'),
            'role_id' => $roleAdmin->id,
        ]
    );
    User::firstOrCreate(
        ['username' => 'admin2'],
        [
            'password' => Hash::make('1234'),
            'role_id' => $roleAdmin->id,
        ]
    );
    User::firstOrCreate(
        ['username' => 'siswa'],
        [
            'password' => Hash::make('1234'),
            'role_id' => $roleStudent->id,
        ]
    );
    User::firstOrCreate(
        ['username' => 'siswa2'],
        [
            'password' => Hash::make('1234'),
            'role_id' => $roleStudent->id,
        ]
    );
    $this->call([
        TeacherSeeder::class,
        StudentSeeder::class,
    ]);
}

}