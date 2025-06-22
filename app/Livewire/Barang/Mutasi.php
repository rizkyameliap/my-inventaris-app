<?php
namespace App\Livewire\Barang; 

use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\RiwayatMutasi;
use Livewire\Component;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;

class Mutasi extends Component
{
    public Barang $barang;
    public $tujuan_lokasi_id;
    public $jumlah_mutasi;
    public $lokasis;

    public function mount(Barang $barang)
    {
        $this->barang = $barang;
        // Ambil semua lokasi kecuali lokasi barang saat ini
        $this->lokasis = Lokasi::where('id', '!=', $barang->lokasi_id)->get();
    }

    protected function rules()
    {
        return [
            'tujuan_lokasi_id' => 'required|exists:lokasi,id',
            'jumlah_mutasi' => 'required|integer|min:1|max:' . $this->barang->jumlah,
        ];
    }

    public function mutate()
    {
        $this->validate(); 

        // Pastikan jumlah mutasi tidak melebihi stok yang tersedia
        if ($this->barang->jumlah < $this->jumlah_mutasi) {
            session()->flash('error', 'Jumlah mutasi melebihi stok barang yang tersedia.');
            return;
        }

        // Simpan lokasi asal saat ini sebelum diupdate
        $lokasiAsalId = $this->barang->lokasi_id;

        // Kurangi jumlah barang dari lokasi asal
        $this->barang->jumlah -= $this->jumlah_mutasi;
        $this->barang->save();

        $barangTujuan = Barang::firstOrNew(
            ['kode_barang' => $this->barang->kode_barang, 'lokasi_id' => $this->tujuan_lokasi_id],
            ['nama' => $this->barang->nama, 'kategori_id' => $this->barang->kategori_id, 'jumlah' => 0]
        );
        $barangTujuan->jumlah += $this->jumlah_mutasi;
        $barangTujuan->save();

        // Catat riwayat mutasi
        RiwayatMutasi::create([
            'barang_id' => $this->barang->id,
            'asal_lokasi_id' => $lokasiAsalId,
            'tujuan_lokasi_id' => $this->tujuan_lokasi_id,
            'jumlah_mutasi' => $this->jumlah_mutasi,
            'tanggal' => now(),
            'status' => 'selesai', // Mutasi dianggap selesai secara instan
        ]);

        session()->flash('message', 'Mutasi barang berhasil.');
        $this->dispatch('barangMutated'); // Memicu event untuk refresh daftar barang

        return redirect()->route('barang.index');
    }

    public function render()
    {
        return view('livewire.barang.mutasi');
    }
}