<div class="py-4">
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
            <div class="card-body p-4 text-white">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bold mb-2">Manajemen Lokasi</h3>
                        <p class="mb-0 opacity-75 fs-5">Kelola semua lokasi penyimpanan barang</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-3">
                        <svg class="text-white" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alerts Section -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 p-2 rounded-3 me-3">
                        <svg class="text-success" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="flex-grow-1">
                        <strong class="fw-semibold">Berhasil!</strong>
                        <span class="ms-2">{{ session('message') }}</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3">
                        <svg class="text-danger" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <div class="flex-grow-1">
                        <strong class="fw-semibold">Error!</strong>
                        <span class="ms-2">{{ session('error') }}</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Action Bar -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="position-relative">
                            <div class="position-absolute top-50 start-0 translate-middle-y ms-3">
                                <svg class="text-muted" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.35-4.35"></path>
                                </svg>
                            </div>
                            <input type="text" wire:model.live="search" class="form-control ps-5 border-0 bg-light" placeholder="Cari lokasi berdasarkan nama atau gedung..." style="border-radius: 12px;">
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('lokasi.create') }}" class="btn btn-success shadow-sm px-4 py-2" style="border-radius: 12px;">
                            <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Tambah Lokasi
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold text-dark mb-0">Daftar Lokasi</h5>
                    <div class="bg-light p-2 rounded-3">
                        <svg class="text-muted" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3 ps-4">No</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Nama Lokasi</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Gedung</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lokasis as $lokasi)
                                <tr>
                                    <td class="border-0 py-3 ps-4">
                                        <div class="bg-primary bg-opacity-10 text-primary fw-semibold rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-size: 12px;">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td class="border-0 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success rounded-circle me-3" style="width: 8px; height: 8px;"></div>
                                            <div>
                                                <div class="fw-semibold text-dark">{{ $lokasi->nama_lokasi }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-0 py-3">
                                        @if($lokasi->gedung)
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2 rounded-pill">
                                                <svg class="me-1" width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                                {{ $lokasi->gedung }}
                                            </span>
                                        @else
                                            <span class="text-muted fst-italic">Tidak ada gedung</span>
                                        @endif
                                    </td>
                                    <td class="border-0 py-3 text-center">
                                        <div class="btn-group shadow-sm" role="group">
                                            <a href="{{ route('lokasi.edit', $lokasi->id) }}" class="btn btn-warning btn-sm px-3" style="border-radius: 8px 0 0 8px;" title="Edit Lokasi">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <button wire:click="deleteLokasi({{ $lokasi->id }})"
                                                onclick="confirm('Anda yakin ingin menghapus lokasi ini? Semua barang yang berelasi akan ikut terhapus.') || event.stopImmediatePropagation()"
                                                class="btn btn-danger btn-sm px-3" style="border-radius: 0 8px 8px 0;" title="Hapus Lokasi">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <polyline points="3,6 5,6 21,6"></polyline>
                                                    <path d="m19,6v14a2,2 0 0,1 -2,2H7a2,2 0 0,1 -2,-2V6m3,0V4a2,2 0 0,1 2,-2h4a2,2 0 0,1 2,2v2"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="border-0 text-center py-5">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="bg-light rounded-circle p-4 mb-3">
                                                <svg class="text-muted" width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </div>
                                            <p class="text-muted fs-5 fw-semibold mb-1">Belum ada lokasi yang terdaftar</p>
                                            <p class="text-muted small mb-3">Mulai dengan menambahkan lokasi pertama Anda</p>
                                            <a href="{{ route('lokasi.create') }}" class="btn btn-primary px-4 py-2" style="border-radius: 12px;">
                                                <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg>
                                                Tambah Lokasi Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @if($lokasis->hasPages())
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-center">
                        {{ $lokasis->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>