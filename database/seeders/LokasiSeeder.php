<?php
// File: database/seeders/LokasiSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lokasi;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lokasi::firstOrCreate(['nama_lokasi' => 'Gudang Utama', 'gedung' => 'A']);
        Lokasi::firstOrCreate(['nama_lokasi' => 'Ruang Server', 'gedung' => 'B']);
        Lokasi::firstOrCreate(['nama_lokasi' => 'Kantor Pusat', 'gedung' => 'C']);
        Lokasi::firstOrCreate(['nama_lokasi' => 'Cabang Jakarta', 'gedung' => 'D']);
        Lokasi::firstOrCreate(['nama_lokasi' => 'Cabang Surabaya', 'gedung' => 'E']);
    }
}