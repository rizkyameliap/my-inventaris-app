<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];

    /**
     * Relasi one-to-many dengan Barang.
     * Satu kategori bisa dimiliki oleh banyak barang.
     */
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    // Tambahan untuk menghindari error jika masih ada yang pakai "barangs"
    public function barangs()
    {
        return $this->barang(); // alias
    }
}
