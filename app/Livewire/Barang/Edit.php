<?php
namespace App\Livewire\Barang; 

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use Livewire\Component;

class Edit extends Component
{
    public Barang $barang;
    public $nama;
    public $kode_barang;
    public $kategori_id;
    public $lokasi_id;
    public $jumlah;

    public $kategoris;
    public $lokasis;

    public function mount(Barang $barang)
    {
        $this->barang = $barang;
        $this->nama = $barang->nama;
        $this->kode_barang = $barang->kode_barang;
        $this->kategori_id = $barang->kategori_id;
        $this->lokasi_id = $barang->lokasi_id;
        $this->jumlah = $barang->jumlah;

        $this->kategoris = Kategori::all();
        $this->lokasis = Lokasi::all();
    }

    protected function rules()
    {
        return [
            'nama' => 'required|min:3',
            'kode_barang' => 'required|unique:barang,kode_barang,' . $this->barang->id,
            'kategori_id' => 'required|exists:kategori,id',
            'lokasi_id' => 'required|exists:lokasi,id',
            'jumlah' => 'required|integer|min:1',
        ];
    }

    public function update()
    {
        $this->validate(); 

        $this->barang->update([
            'nama' => $this->nama,
            'kode_barang' => $this->kode_barang,
            'kategori_id' => $this->kategori_id,
            'lokasi_id' => $this->lokasi_id,
            'jumlah' => $this->jumlah,
        ]);

        session()->flash('message', 'Barang berhasil diperbarui.');

        return redirect()->route('barang.index');
    }

    public function render()
    {
        return view('livewire.barang.edit');
    }
}