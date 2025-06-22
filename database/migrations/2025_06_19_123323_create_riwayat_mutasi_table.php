<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_mutasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            $table->foreignId('asal_lokasi_id')->constrained('lokasi')->onDelete('cascade');
            $table->foreignId('tujuan_lokasi_id')->constrained('lokasi')->onDelete('cascade');
            $table->integer('jumlah_mutasi');
            $table->date('tanggal');
            $table->string('status')->default('selesai'); // 'pending', 'selesai', etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_mutasi');
    }
};