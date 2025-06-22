<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // Tampilkan daftar semua kategori
    public function index()
    {
        $kategoris = Kategori::with('barangs')->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.kategori.index', compact('kategoris'));

    }

    // Tampilkan form tambah kategori
    public function create()
    {
        return view('livewire.kategori.create');
    }

    // Simpan kategori baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan ke database
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect kembali ke halaman index
        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }
    public function edit($id)
{
    $kategori = Kategori::findOrFail($id);
    return view('livewire.kategori.edit', compact('kategori'));
}

// Update data kategori
public function update(Request $request, $id)
{
    $request->validate([
        'nama_kategori' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
    ]);

    $kategori = Kategori::findOrFail($id);
    $kategori->update([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
}
public function show($id)
{
    $kategori = Kategori::findOrFail($id);
    return view('livewire.kategori.show', compact('kategori'));
}
public function destroy($id)
{
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');  
}

}