<?php
namespace App\Livewire\Barang; 

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[On('barangDeleted')]
    #[On('barangMutated')]
    public function refreshBarangs()
    {
        $this->resetPage();
    }

    public function render()
    {
        $barangs = Barang::with(['kategori', 'lokasi'])
                    ->where(function($query) {
                        $query->where('nama', 'like', '%' . $this->search . '%')
                              ->orWhere('kode_barang', 'like', '%' . $this->search . '%');
                    })
                    ->orderBy('nama')
                    ->paginate(10);

        return view('livewire.barang.index', [
            'barangs' => $barangs,
        ]);
    }
}