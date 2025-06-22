<?php
// File: app/Livewire/Lokasi/Edit.php

namespace App\Livewire\Lokasi; // Perbaikan: namespace ke App\Livewire

use App\Models\Lokasi;
use Livewire\Component;

class Edit extends Component
{
    public Lokasi $lokasi;
    public $nama_lokasi;
    public $gedung;

    /**
     * Mount lifecycle hook untuk memuat data lokasi yang akan diedit.
     */
    public function mount(Lokasi $lokasi)
    {
        $this->lokasi = $lokasi;
        $this->nama_lokasi = $lokasi->nama_lokasi;
        $this->gedung = $lokasi->gedung;
    }

    /**
     * Aturan validasi untuk input form.
     * Rule unique diabaikan untuk ID lokasi yang sedang diedit.
     */
    protected function rules()
    {
        return [
            'nama_lokasi' => 'required|min:3|unique:lokasi,nama_lokasi,' . $this->lokasi->id,
            'gedung' => 'nullable|string|max:255',
        ];
    }

    /**
     * Memperbarui data lokasi di database.
     */
    public function update()
    {
        $this->validate(); // Jalankan validasi

        $this->lokasi->update([
            'nama_lokasi' => $this->nama_lokasi,
            'gedung' => $this->gedung,
        ]);

        session()->flash('message', 'Lokasi berhasil diperbarui.');

        return redirect()->route('lokasi.index');
    }

    /**
     * Render view komponen.
     */
    public function render()
    {
        return view('livewire.lokasi.edit');
    }
}