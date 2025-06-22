<!-- File: resources/views/dashboard.blade.php -->
<x-layouts.app>
    <x-slot name="header">
        <h2 class="fw-bold text-dark">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container-fluid">
            <!-- Welcome Section -->
            <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #007bff 0%, #6f42c1 100%);">
                <div class="card-body p-4 text-white">
                    <h3 class="fw-bold mb-2">Selamat datang kembali!</h3>
                    <p class="mb-0 opacity-75 fs-5">{{ Auth::user()->name }}</p>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4 mb-4">
                <!-- Total Barang Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small fw-semibold mb-1">Total Barang</p>
                                    <h3 class="fw-bold text-dark mb-0">{{ $totalBarang }}</h3>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                                    <svg class="text-primary" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Lokasi Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small fw-semibold mb-1">Total Lokasi</p>
                                    <h3 class="fw-bold text-dark mb-0">{{ $totalLokasi }}</h3>
                                </div>
                                <div class="bg-success bg-opacity-10 p-3 rounded-3">
                                    <svg class="text-success" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Kategori Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small fw-semibold mb-1">Total Kategori</p>
                                    <h3 class="fw-bold text-dark mb-0">{{ $totalKategori }}</h3>
                                </div>
                                <div class="bg-secondary bg-opacity-10 p-3 rounded-3">
                                    <svg class="text-secondary" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Items Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="fw-bold text-dark mb-0">Barang Terakhir Ditambahkan</h5>
                        <div class="bg-light p-2 rounded-3">
                            <svg class="text-muted" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase">Nama Barang</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase">Kode Barang</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase">Lokasi</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase">Jumlah</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase">Ditambahkan Pada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barangTerakhirDitambahkan as $barang)
                                    <tr>
                                        <td class="border-0 py-3">
                                            <div class="fw-semibold text-dark">{{ $barang->nama }}</div>
                                        </td>
                                        <td class="border-0 py-3">
                                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                                {{ $barang->kode_barang }}
                                            </span>
                                        </td>
                                        <td class="border-0 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-success rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                                                <span class="text-dark">{{ $barang->lokasi->nama_lokasi }}</span>
                                            </div>
                                        </td>
                                        <td class="border-0 py-3">
                                            <div class="fw-semibold text-dark">{{ $barang->jumlah }}</div>
                                        </td>
                                        <td class="border-0 py-3 text-muted">
                                            {{ $barang->created_at->format('d M Y H:i') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="border-0 text-center py-5">
                                            <div class="d-flex flex-column align-items-center">
                                                <svg class="text-muted mb-3" width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                                </svg>
                                                <p class="text-muted fs-5 fw-semibold mb-1">Tidak ada barang yang baru ditambahkan</p>
                                                <p class="text-muted small mb-0">Barang yang ditambahkan akan muncul di sini</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>