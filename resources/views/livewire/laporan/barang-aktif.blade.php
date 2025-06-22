<div class="py-4">
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
            <div class="card-body p-4 text-white">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bold mb-2">Laporan Barang Aktif</h3>
                        <p class="mb-0 opacity-75 fs-6">Menampilkan semua barang yang sedang aktif dalam sistem</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-3">
                        <svg class="text-white" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Section -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="position-relative">
                            <input type="text" wire:model.live="search" class="form-control ps-5 border-0 bg-light" 
                                   placeholder="Cari barang aktif..." style="height: 48px;">
                            <div class="position-absolute top-50 start-0 translate-middle-y ms-3">
                                <svg class="text-muted" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <div class="d-flex align-items-center justify-content-md-end">
                            <div class="bg-success bg-opacity-10 p-2 rounded-3 me-3">
                                <svg class="text-success" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <span class="text-muted small fw-semibold">Total: {{ $barangs->total() }} item</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold text-dark mb-0">Daftar Barang Aktif</h5>
                    <div class="bg-light p-2 rounded-3">
                        <svg class="text-muted" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">No</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Nama Barang</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Kode Barang</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Kategori</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Lokasi</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barangs as $barang)
                                <tr>
                                    <td class="border-0 py-3">
                                        <span class="text-muted">{{ $barangs->firstItem() + $loop->index }}</span>
                                    </td>
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
                                            <div class="bg-warning rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                                            <span class="text-dark">{{ $barang->kategori->nama_kategori }}</span>
                                        </div>
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border-0 text-center py-5">
                                        <div class="d-flex flex-column align-items-center">
                                            <svg class="text-muted mb-3" width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                            </svg>
                                            <p class="text-muted fs-5 fw-semibold mb-1">Tidak ada barang aktif ditemukan</p>
                                            <p class="text-muted small mb-0">Barang aktif akan muncul di sini setelah ditambahkan</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            @if($barangs->hasPages())
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-center">
                        {{ $barangs->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>