<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghapusan extends Model
{
    use HasFactory;

    protected $table = 'penghapusan';
    protected $fillable = [
        'barang_id',
        'jumlah_hapus',
        'alasan',
        'tanggal'
    ];

    protected $dates = ['tanggal'];

    /**
     * Relasi many-to-one dengan Barang.
     * Riwayat penghapusan belongsTo satu barang.
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}