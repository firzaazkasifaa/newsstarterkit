<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // <<< Pastikan ini ada

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 'Test User' dengan password yang di-hash
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'), // Password 'password'
            // 'role' => 'user', // Opsional, jika Anda punya kolom role
        ]);

        // Memanggil seeder lainnya
        $this->call([
            AdminUserSeeder::class,
            EditorUserSeeder::class,    // <<< PASTIKAN BARIS INI ADA
            ReporterUserSeeder::class,  // <<< PASTIKAN BARIS INI ADA
            CategoriesSeeder::class,
        ]);
    }
}