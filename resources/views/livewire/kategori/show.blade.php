<x-layouts.app>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <a href="{{ route('kategori.index') }}" class="btn btn-light me-3">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="fw-bold text-dark mb-0">{{ __('Detail Kategori') }}</h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom">
                            <h5 class="fw-bold text-dark mb-0">Informasi Kategori</h5>
                        </div>

                        <div class="card-body p-4">
                            <!-- Nama Kategori -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-dark">Nama Kategori</label>
                                <div class="form-control bg-light border-0">{{ $kategori->nama_kategori }}</div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-dark">Deskripsi</label>
                                <div class="form-control bg-light border-0">
                                    {{ $kategori->deskripsi ?? '-' }}
                                </div>
                            </div>

                            <!-- Tanggal Dibuat -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-dark">Dibuat pada</label>
                                <div class="form-control bg-light border-0">
                                    {{ $kategori->created_at->translatedFormat('d F Y, H:i') }}
                                </div>
                            </div>

                            <!-- Tombol Kembali -->
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                                    <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</x-layouts.app>
