<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropUnique(['kode_barang']); // Hapus unique lama
            $table->unique(['kode_barang', 'lokasi_id']); // Tambah unique gabungan
        });
    }

    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropUnique(['barang_kode_barang_unique', 'lokasi_id']);
            $table->unique('kode_barang'); // Kembalikan ke awal jika dibatalkan
        });
    }
};
