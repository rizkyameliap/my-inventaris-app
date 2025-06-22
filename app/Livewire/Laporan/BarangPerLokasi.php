<?php
// File: app/Livewire/Laporan/BarangPerLokasi.php

namespace App\Livewire\Laporan; // Perbaikan: namespace ke App\Livewire

use App\Models\Lokasi;
use Livewire\Component;

class BarangPerLokasi extends Component
{
    /**
     * Render view komponen.
     */
    public function render()
    {
        // Mengambil semua lokasi dan menghitung total jumlah barang di setiap lokasi
        $lokasiDenganJumlahBarang = Lokasi::withSum('barang', 'jumlah')->get();

        return view('livewire.laporan.barang-per-lokasi', [
            'lokasiDenganJumlahBarang' => $lokasiDenganJumlahBarang,
        ]);
    }
}