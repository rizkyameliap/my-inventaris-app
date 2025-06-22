<?php
namespace App\Livewire\Barang; 

use App\Models\Barang;
use App\Models\Penghapusan;
use Livewire\Component;
use Livewire\Attributes\On;

class Delete extends Component
{
    public $barangId;
    public $showModal = false;
    public $alasan;
    public $jumlah_hapus;

    #[On('showDeleteConfirmation')]
    public function confirmDelete($barangId)
    {
        $this->barangId = $barangId;
        $this->showModal = true;
        $this->alasan = ''; 
        $this->jumlah_hapus = 1; 
    }

    protected function rules()
    {
        $barang = Barang::find($this->barangId);
        $maxJumlah = $barang ? $barang->jumlah : 0;

        return [
            'alasan' => 'required|min:10',
            'jumlah_hapus' => 'required|integer|min:1|max:' . $maxJumlah,
        ];
    }

    public function deleteBarang()
    {
        $this->validate(); 

        $barang = Barang::find($this->barangId);

        if (!$barang) {
            session()->flash('error', 'Barang tidak ditemukan.');
            $this->showModal = false;
            return;
        }

        if ($barang->isInMutasi()) {
            session()->flash('error', 'Barang ini sedang dalam proses mutasi dan tidak bisa dihapus.');
            $this->showModal = false;
            return;
        }

        // Pastikan jumlah penghapusan tidak melebihi stok yang tersedia
        if ($this->jumlah_hapus > $barang->jumlah) {
            session()->flash('error', 'Jumlah penghapusan melebihi stok barang yang tersedia.');
            $this->showModal = false;
            return;
        }

        // Catat riwayat penghapusan
        Penghapusan::create([
            'barang_id' => $barang->id,
            'jumlah_hapus' => $this->jumlah_hapus,
            'alasan' => $this->alasan,
            'tanggal' => now(),
        ]);

        $barang->jumlah -= $this->jumlah_hapus;
        if ($barang->jumlah <= 0) {
            $barang->delete(); 
        } else {
            $barang->save(); 
        }

        session()->flash('message', 'Barang berhasil dihapus sebagian atau seluruhnya.');
        $this->showModal = false;
        $this->dispatch('barangDeleted'); 
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation(); 
    }

    public function render()
    {
        return view('livewire.barang.delete');
    }
}