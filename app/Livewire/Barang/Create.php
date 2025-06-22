<?php

namespace App\Livewire\Barang; 

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use Livewire\Component;

class Create extends Component
{
    public $nama;
    public $kode_barang;
    public $kategori_id;
    public $lokasi_id;
    public $jumlah;

    public $kategoris;
    public $lokasis;

    public function mount()
    {
        $this->kategoris = Kategori::all();
        $this->lokasis = Lokasi::all();
    }

    protected $rules = [
        'nama' => 'required|min:3',
        'kode_barang' => 'required|unique:barang,kode_barang',
        'kategori_id' => 'required|exists:kategori,id',
        'lokasi_id' => 'required|exists:lokasi,id',
        'jumlah' => 'required|integer|min:1',
    ];

    public function store()
    {
        $this->validate(); 

        Barang::create([
            'nama' => $this->nama,
            'kode_barang' => $this->kode_barang,
            'kategori_id' => $this->kategori_id,
            'lokasi_id' => $this->lokasi_id,
            'jumlah' => $this->jumlah,
        ]);

        session()->flash('message', 'Barang berhasil ditambahkan.');

        return redirect()->route('barang.index');
    }

    public function render()
    {
        return view('livewire.barang.create');
    }
}