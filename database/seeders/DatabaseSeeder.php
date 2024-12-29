<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Amanda',
            'email' => 'amanda@example.com', // Kolom email sesuai tabel Anda
            'email_verified_at' => now(), // Menandakan email sudah diverifikasi
            'password' => Hash::make('manda11'), // Password harus di-hash
            'role' => 'owner', // Role pengguna
        ]);
        
    }
}
