<?php
// File: app/Livewire/Laporan/BarangAktif.php

namespace App\Livewire\Laporan; // Perbaikan: namespace ke App\Livewire

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;

class BarangAktif extends Component
{
    use WithPagination;

    public $search = '';
    protected $paginationTheme = 'bootstrap';

    /**
     * Reset halaman pagination saat search diupdate.
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Render view komponen.
     */
    public function render()
    {
        $barangs = Barang::with(['kategori', 'lokasi'])
                    ->where('jumlah', '>', 0) // Filter barang yang jumlahnya lebih dari 0 (aktif)
                    ->where(function($query) {
                        $query->where('nama', 'like', '%' . $this->search . '%')
                              ->orWhere('kode_barang', 'like', '%' . $this->search . '%');
                    })
                    ->orderBy('nama')
                    ->paginate(10);

        return view('livewire.laporan.barang-aktif', [
            'barangs' => $barangs,
        ]);
    }
}