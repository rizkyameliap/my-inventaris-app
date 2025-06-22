<div>
    <div class="py-4">
        <div class="container-fluid">
            <!-- Header Section -->
            <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #007bff 0%, #6f42c1 100%);">
                <div class="card-body p-4 text-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bold mb-2">Manajemen Barang</h3>
                            <p class="mb-0 opacity-75 fs-5">Kelola inventaris barang Anda</p>
                        </div>
                        <div class="bg-white bg-opacity-20 p-3 rounded-3">
                            <svg class="text-white" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Action Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-lg-8">
                            <div class="position-relative">
                                <svg class="position-absolute top-50 translate-middle-y ms-3 text-muted" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" wire:model.live="search" class="form-control ps-5 border-0 bg-light" placeholder="Cari nama barang, kode barang, atau kategori...">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <a href="{{ route('barang.create') }}" class="btn btn-primary fw-semibold w-100">
                                <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Barang Baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts -->
            @if (session()->has('message'))
                <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 p-2 rounded-3 me-3">
                            <svg class="text-success" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="flex-grow-1">
                            {{ session('message') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3">
                            <svg class="text-danger" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div class="flex-grow-1">
                            {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Data Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="fw-bold text-dark mb-0">Daftar Barang</h5>
                        <div class="bg-light p-2 rounded-3">
                            <svg class="text-muted" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase px-4 py-3">No</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Nama Barang</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Kode Barang</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Kategori</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Lokasi</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Jumlah</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barangs as $barang)
                                    <tr>
                                        <td class="border-0 px-4 py-3">
                                            <span class="text-muted">{{ $loop->iteration }}</span>
                                        </td>
                                        <td class="border-0 py-3">
                                            <div class="fw-semibold text-dark">{{ $barang->nama }}</div>
                                        </td>
                                        <td class="border-0 py-3">
                                            <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold">
                                                {{ $barang->kode_barang }}
                                            </span>
                                        </td>
                                        <td class="border-0 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-secondary rounded-circle me-2" style="width: 8px; height: 8px;"></div>
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
                                            <span class="fw-semibold text-dark">{{ $barang->jumlah }}</span>
                                        </td>
                                        <td class="border-0 py-3">
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-outline-warning border-0" title="Edit">
                                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <button wire:click="$dispatch('showDeleteConfirmation', {{ $barang->id }})" class="btn btn-sm btn-outline-danger border-0" title="Hapus">
                                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                                <a href="{{ route('barang.mutasi', $barang->id) }}" class="btn btn-sm btn-outline-info border-0" title="Mutasi">
                                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="border-0 text-center py-5">
                                            <div class="d-flex flex-column align-items-center">
                                                <svg class="text-muted mb-3" width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                                </svg>
                                                <p class="text-muted fs-5 fw-semibold mb-1">Tidak ada data barang</p>
                                                <p class="text-muted small mb-0">Barang yang ditambahkan akan muncul di sini</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                @if($barangs->hasPages())
                    <div class="card-footer bg-white border-top">
                        {{ $barangs->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Livewire component untuk konfirmasi penghapusan --}}
    <livewire:barang.delete />
</div>