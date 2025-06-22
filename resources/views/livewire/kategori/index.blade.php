<x-layouts.app>
    <x-slot name="header">
        <h2 class="fw-bold text-dark">
            {{ __('Manajemen Kategori') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container-fluid">
            <!-- Header Section -->
            <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%);">
                <div class="card-body p-4 text-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bold mb-2">Kategori Barang</h3>
                            <p class="mb-0 opacity-75 fs-6">Kelola kategori untuk mengorganisir barang Anda</p>
                        </div>
                        <div class="bg-white bg-opacity-20 p-3 rounded-3">
                            <svg class="text-white" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="position-relative">
                                <input type="text" id="search-kategori" class="form-control ps-5 border-0 bg-light" 
                                       placeholder="Cari kategori..." style="height: 48px;">
                                <div class="position-absolute top-50 start-0 translate-middle-y ms-3">
                                    <svg class="text-muted" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end mt-3 mt-md-0">
                            <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-lg shadow-sm">
                                <svg class="me-2" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Kategori
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4 mb-4">
                <!-- Total Kategori Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small fw-semibold mb-1">Total Kategori</p>
                                    <h3 class="fw-bold text-dark mb-0">{{ $kategoris->count() }}</h3>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                                    <svg class="text-primary" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
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

                <!-- Kategori Aktif Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small fw-semibold mb-1">Kategori Aktif</p>
                                    <h3 class="fw-bold text-dark mb-0">{{ $kategoris->where('status', 'aktif')->count() }}</h3>
                                </div>
                                <div class="bg-success bg-opacity-10 p-3 rounded-3">
                                    <svg class="text-success" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Barang Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small fw-semibold mb-1">Total Barang</p>
                                    <h3 class="fw-bold text-dark mb-0">{{ $kategoris->sum(function($kategori) { return $kategori->barangs->count(); }) }}</h3>
                                </div>
                                <div class="bg-info bg-opacity-10 p-3 rounded-3">
                                    <svg class="text-info" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <svg class="text-success me-3" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger border-0 shadow-sm mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <svg class="text-danger me-3" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- Kategori Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="fw-bold text-dark mb-0">Daftar Kategori</h5>
                        <div class="bg-light p-2 rounded-3">
                            <svg class="text-muted" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="kategori-table">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">No</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Nama Kategori</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Deskripsi</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Status</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Jumlah Barang</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Dibuat Pada</th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategoris as $kategori)
                                    <tr>
                                        <td class="border-0 py-3">
                                            <span class="text-muted">{{ $loop->iteration }}</span>
                                        </td>
                                        <td class="border-0 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                    <svg class="text-white" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold text-dark">{{ $kategori->nama_kategori }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-0 py-3">
                                            <div class="text-muted">
                                                {{ Str::limit($kategori->deskripsi ?? '-', 50) }}
                                            </div>
                                        </td>
                                        <td class="border-0 py-3">
                                            @if($kategori->status === 'aktif')
                                                <span class="badge bg-success bg-opacity-10 text-success">
                                                    <svg class="me-1" width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Aktif
                                                </span>
                                            @else
                                                <span class="badge bg-danger bg-opacity-10 text-danger">
                                                    <svg class="me-1" width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    Tidak Aktif
                                                </span>
                                            @endif
                                        </td>
                                        <td class="border-0 py-3">
                                            <div class="fw-semibold text-dark">{{ $kategori->barangs->count() }}</div>
                                        </td>
                                        <td class="border-0 py-3 text-muted">
                                            {{ $kategori->created_at->format('d M Y H:i') }}
                                        </td>
                                        <td class="border-0 py-3">
                                            <div class="dropdown">
                                                <button class="btn btn-light btn-sm dropdown-toggle border-0" type="button" data-bs-toggle="dropdown">
                                                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                                    </svg>
                                                </button>
                                                <ul class="dropdown-menu border-0 shadow">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('kategori.show', $kategori) }}">
                                                            <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                            </svg>
                                                            Detail
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('kategori.edit', $kategori) }}">
                                                            <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                </svg>
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="border-0 text-center py-5">
                                            <div class="d-flex flex-column align-items-center">
                                                <svg class="text-muted mb-3" width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                </svg>
                                                <p class="text-muted fs-5 fw-semibold mb-1">Tidak ada kategori ditemukan</p>
                                                <p class="text-muted small mb-3">Mulai dengan menambahkan kategori pertama Anda</p>
                                                <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                                                    <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                    Tambah Kategori
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @if($kategoris->hasPages())
                    <div class="card-footer bg-white border-top-0">
                        <div class="d-flex justify-content-center">
                            {{ $kategoris->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Search functionality
        document.getElementById('search-kategori').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#kategori-table tbody tr');
            
            tableRows.forEach(row => {
                const namaKategori = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const deskripsi = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                
                if (namaKategori.includes(searchValue) || deskripsi.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
    @endpush
</x-layouts.app>