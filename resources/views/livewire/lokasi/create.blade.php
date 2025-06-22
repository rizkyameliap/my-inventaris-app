<div class="py-4">
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
            <div class="card-body p-4 text-white">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-3 me-3">
                        <svg class="text-white" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-1">Tambah Lokasi Baru</h3>
                        <p class="mb-0 opacity-75">Masukkan informasi lokasi penyimpanan barang</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 p-2 rounded-3 me-3">
                                <svg class="text-success" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h5 class="fw-bold text-dark mb-0">Formulir Lokasi</h5>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form wire:submit.prevent="store">
                            <!-- Nama Lokasi Field -->
                            <div class="mb-4">
                                <label for="nama_lokasi" class="form-label fw-semibold text-dark mb-2">
                                    <svg class="me-2 text-primary" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Nama Lokasi
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="position-relative">
                                    <input type="text" 
                                           class="form-control @error('nama_lokasi') is-invalid @enderror" 
                                           id="nama_lokasi" 
                                           wire:model="nama_lokasi"
                                           placeholder="Contoh: Ruang Server, Gudang A, Lantai 2..."
                                           style="border-radius: 12px; padding: 12px 16px;">
                                    @error('nama_lokasi') 
                                        <div class="invalid-feedback">
                                            <svg class="me-1" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                            </svg>
                                            {{ $message }}
                                        </div> 
                                    @enderror
                                </div>
                                <small class="text-muted mt-1 d-block">Masukkan nama lokasi yang mudah diingat dan spesifik</small>
                            </div>

                            <!-- Gedung Field -->
                            <div class="mb-4">
                                <label for="gedung" class="form-label fw-semibold text-dark mb-2">
                                    <svg class="me-2 text-secondary" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    Gedung
                                    <span class="badge bg-light text-muted ms-2 px-2 py-1 rounded-pill small">Opsional</span>
                                </label>
                                <div class="position-relative">
                                    <input type="text" 
                                           class="form-control @error('gedung') is-invalid @enderror" 
                                           id="gedung" 
                                           wire:model="gedung"
                                           placeholder="Contoh: Gedung A, Tower 1, Main Building..."
                                           style="border-radius: 12px; padding: 12px 16px;">
                                    @error('gedung') 
                                        <div class="invalid-feedback">
                                            <svg class="me-1" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                            </svg>
                                            {{ $message }}
                                        </div> 
                                    @enderror
                                </div>
                                <small class="text-muted mt-1 d-block">Isi jika lokasi berada dalam gedung tertentu</small>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-3 pt-3 border-top">
                                <button type="submit" class="btn btn-success px-4 py-2 shadow-sm" style="border-radius: 12px;">
                                    <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Simpan Lokasi
                                </button>
                                <a href="{{ route('lokasi.index') }}" class="btn btn-light px-4 py-2 shadow-sm" style="border-radius: 12px;">
                                    <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Helper Card -->
                <div class="card border-0 shadow-sm mt-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="bg-info bg-opacity-10 p-2 rounded-3 me-3 flex-shrink-0">
                                <svg class="text-info" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="l9,12h6"></path>
                                    <path d="m12,8v8"></path>
                                </svg>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-2">Tips Penamaan Lokasi</h6>
                                <ul class="text-muted small mb-0 ps-3">
                                    <li>Gunakan nama yang spesifik dan mudah diingat</li>
                                    <li>Sertakan informasi lantai atau area jika perlu</li>
                                    <li>Konsisten dengan sistem penamaan yang sudah ada</li>
                                    <li>Hindari penggunaan karakter khusus yang tidak perlu</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>