<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roleAdmin = Role::firstOrCreate(['role_name' => 'admin']);
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Role::factory()->create([
            'role_name' => 'admin',
        ]);
        Role::factory()->create([
            'role_name' => 'user',
        ]);
        User::factory()->create([
            'username' => 'admin', // Username admin
            'password' => '1234', // Password admin
            'role_id' => $roleAdmin->id, // Menghubungkan dengan role admin
        ]);
    }
}
