<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Kategori;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan statistik.
     */
    public function index()
    {
        $totalBarang = Barang::sum('jumlah');
        $totalLokasi = Lokasi::count();
        $totalKategori = Kategori::count();
        $barangTerakhirDitambahkan = Barang::latest()->take(5)->get();

        return view('dashboard', compact('totalBarang', 'totalLokasi', 'totalKategori', 'barangTerakhirDitambahkan'));
    }
}