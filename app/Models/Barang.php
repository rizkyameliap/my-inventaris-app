<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = [
        'nama',
        'kode_barang',
        'kategori_id',
        'lokasi_id',
        'jumlah'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    /**
     * Relasi many-to-one dengan Lokasi.
     * Sebuah barang belongsTo satu lokasi.
     */
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    /**
     * Relasi one-to-many dengan RiwayatMutasi.
     * Sebuah barang bisa memiliki banyak riwayat mutasi.
     */
    public function riwayatMutasi()
    {
        return $this->hasMany(RiwayatMutasi::class);
    }

    /**
     * Relasi one-to-many dengan Penghapusan.
     * Sebuah barang bisa memiliki banyak riwayat penghapusan.
     */
    public function penghapusan()
    {
        return $this->hasMany(Penghapusan::class);
    }

    /**
     * Cek apakah barang sedang dalam proses mutasi (status 'pending').
     * Kita asumsikan ada status 'pending' di riwayat_mutasi.
     */
    public function isInMutasi()
    {
        return $this->riwayatMutasi()->where('status', 'pending')->exists();
    }
}