<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasi';
    protected $fillable = ['nama_lokasi', 'gedung'];

    /**
     * Relasi one-to-many dengan Barang.
     * Satu lokasi bisa memiliki banyak barang.
     */
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    /**
     * Relasi one-to-many dengan RiwayatMutasi (sebagai asal).
     */
    public function mutasiAsal()
    {
        return $this->hasMany(RiwayatMutasi::class, 'asal_lokasi_id');
    }

    /**
     * Relasi one-to-many dengan RiwayatMutasi (sebagai tujuan).
     */
    public function mutasiTujuan()
    {
        return $this->hasMany(RiwayatMutasi::class, 'tujuan_lokasi_id');
    }
}