<?php
// File: app/Livewire/Lokasi/Index.php

namespace App\Livewire\Lokasi; // Perbaikan: namespace ke App\Livewire

use App\Models\Lokasi;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Index extends Component
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
     * Listener untuk event 'lokasiDeleted' atau 'lokasiUpdated' dari komponen lain.
     * Digunakan untuk me-refresh data tabel.
     */
    #[On('lokasiDeleted')]
    #[On('lokasiUpdated')]
    public function refreshLokasis()
    {
        $this->resetPage();
    }

    /**
     * Render view komponen.
     */
    public function render()
    {
        $lokasis = Lokasi::where('nama_lokasi', 'like', '%' . $this->search . '%')
                        ->orWhere('gedung', 'like', '%' . $this->search . '%')
                        ->orderBy('nama_lokasi')
                        ->paginate(10);

        return view('livewire.lokasi.index', [
            'lokasis' => $lokasis,
        ]);
    }

    /**
     * Menghapus lokasi.
     * Tidak ada validasi mutasi di sini karena lokasi bisa dihapus walau ada barang.
     * Namun, pastikan relasi 'onDelete('cascade')' di migrasi barang sudah benar
     * agar barang-barang yang berelasi ikut terhapus atau atur ulang relasinya.
     *
     * Note: Untuk aplikasi yang lebih kompleks, disarankan untuk tidak langsung menghapus lokasi
     * jika ada barang yang terkait, melainkan mengarsipkan atau memindahkan barang terlebih dahulu.
     */
    public function deleteLokasi($id)
    {
        $lokasi = Lokasi::find($id);

        if (!$lokasi) {
            session()->flash('error', 'Lokasi tidak ditemukan.');
            return;
        }

        // Anda mungkin ingin menambahkan konfirmasi di UI sebelum menghapus.
        $lokasi->delete();
        session()->flash('message', 'Lokasi berhasil dihapus.');
        $this->dispatch('lokasiDeleted');
    }
}