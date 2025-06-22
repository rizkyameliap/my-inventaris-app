<?php
// File: database/seeders/KategoriSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::firstOrCreate(['nama_kategori' => 'Elektronik']);
        Kategori::firstOrCreate(['nama_kategori' => 'Perabotan']);
        Kategori::firstOrCreate(['nama_kategori' => 'Alat Tulis']);
        Kategori::firstOrCreate(['nama_kategori' => 'Komponen Komputer']);
        Kategori::firstOrCreate(['nama_kategori' => 'Perlengkapan Dapur']);
    }
}