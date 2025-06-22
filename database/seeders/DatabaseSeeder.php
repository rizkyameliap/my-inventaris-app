<?php
// File: database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Ini sudah benar
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KategoriSeeder::class,
            LokasiSeeder::class,
        ]);
        // Anda juga bisa menambahkan seeder untuk User jika ingin ada user default
        // User::factory(10)->create(); // Contoh jika menggunakan factory
    }
}