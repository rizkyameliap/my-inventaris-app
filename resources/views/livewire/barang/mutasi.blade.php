<div>
    <div class="py-4">
        <div class="container-fluid">
            <!-- Header Section -->
            <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);">
                <div class="card-body p-4 text-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bold mb-2">Mutasi Barang</h3>
                            <p class="mb-0 opacity-75 fs-5">Pindahkan barang antar lokasi</p>
                        </div>
                        <div class="bg-white bg-opacity-20 p-3 rounded-3">
                            <svg class="text-white" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Barang Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="bg-light p-2 rounded-3 me-3">
                            <svg class="text-muted" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h5 class="fw-bold text-dark mb-0">Informasi Barang</h5>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                                    <svg class="text-primary" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-muted small mb-1">Nama Barang</p>
                                    <p class="fw-bold text-dark mb-0">{{ $barang->nama }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <div class="bg-secondary bg-opacity-10 p-2 rounded-3 me-3">
                                    <svg class="text-secondary" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-muted small mb-1">Kode Barang</p>
                                    <p class="fw-bold text-dark mb-0">{{ $barang->kode_barang }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <div class="bg-success bg-opacity-10 p-2 rounded-3 me-3">
                                    <svg class="text-success" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-muted small mb-1">Lokasi Saat Ini</p>
                                    <p class="fw-bold text-dark mb-0">{{ $barang->lokasi->nama_lokasi }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <div class="bg-warning bg-opacity-10 p-2 rounded-3 me-3">
                                    <svg class="text-warning" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-muted small mb-1">Jumlah Tersedia</p>
                                    <p class="fw-bold text-dark mb-0">{{ $barang->jumlah }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Mutasi Section -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="bg-light p-2 rounded-3 me-3">
                            <svg class="text-muted" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h5 class="fw-bold text-dark mb-0">Form Mutasi Barang</h5>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form wire:submit.prevent="mutate">
                        <div class="row g-4">
                            <!-- Lokasi Tujuan -->
                            <div class="col-lg-6">
                                <label for="tujuan_lokasi_id" class="form-label fw-semibold text-dark">
                                    <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Lokasi Tujuan
                                </label>
                                <select class="form-select border-0 bg-light @error('tujuan_lokasi_id') is-invalid @enderror" id="tujuan_lokasi_id" wire:model="tujuan_lokasi_id">
                                    <option value="">Pilih Lokasi Tujuan</option>
                                    @foreach ($lokasis as $lokasi)
                                        <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                                    @endforeach
                                </select>
                                @error('tujuan_lokasi_id') 
                                    <div class="invalid-feedback d-flex align-items-center">
                                        <svg class="me-1" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </div> 
                                @enderror
                            </div>

                            <!-- Jumlah Mutasi -->
                            <div class="col-lg-6">
                                <label for="jumlah_mutasi" class="form-label fw-semibold text-dark">
                                    <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    Jumlah Mutasi
                                </label>
                                <input type="number" class="form-control border-0 bg-light @error('jumlah_mutasi') is-invalid @enderror" id="jumlah_mutasi" wire:model="jumlah_mutasi" placeholder="Masukkan jumlah yang akan dipindahkan" min="1" max="{{ $barang->jumlah }}">
                                @error('jumlah_mutasi') 
                                    <div class="invalid-feedback d-flex align-items-center">
                                        <svg class="me-1" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </div> 
                                @enderror
                                <div class="form-text text-muted">
                                    <svg class="me-1" width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Maksimal: {{ $barang->jumlah }} unit
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Action Buttons -->
                <div class="card-footer bg-light border-top">
                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('barang.index') }}" class="btn btn-light border fw-semibold">
                            <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </a>
                        <button type="submit" wire:click="mutate" class="btn btn-info fw-semibold text-white">
                            <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            Mutasi Barang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>