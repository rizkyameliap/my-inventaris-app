<?php
// File: app/Livewire/Lokasi/Create.php

namespace App\Livewire\Lokasi; // Perbaikan: namespace ke App\Livewire

use App\Models\Lokasi;
use Livewire\Component;

class Create extends Component
{
    public $nama_lokasi;
    public $gedung;

    /**
     * Aturan validasi untuk input form.
     */
    protected $rules = [
        'nama_lokasi' => 'required|min:3|unique:lokasi,nama_lokasi',
        'gedung' => 'nullable|string|max:255',
    ];

    /**
     * Menyimpan data lokasi baru ke database.
     */
    public function store()
    {
        $this->validate(); // Jalankan validasi

        Lokasi::create([
            'nama_lokasi' => $this->nama_lokasi,
            'gedung' => $this->gedung,
        ]);

        session()->flash('message', 'Lokasi berhasil ditambahkan.');

        return redirect()->route('lokasi.index');
    }

    /**
     * Render view komponen.
     */
    public function render()
    {
        return view('livewire.lokasi.create');
    }
}