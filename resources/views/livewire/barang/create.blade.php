<div>
    <div class="py-4">
        <div class="container-fluid">
            <!-- Header Section -->
            <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                <div class="card-body p-4 text-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bold mb-2">Tambah Barang Baru</h3>
                            <p class="mb-0 opacity-75 fs-5">Tambahkan barang baru ke inventaris</p>
                        </div>
                        <div class="bg-white bg-opacity-20 p-3 rounded-3">
                            <svg class="text-white" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="bg-light p-2 rounded-3 me-3">
                            <svg class="text-muted" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h5 class="fw-bold text-dark mb-0">Form Tambah Barang</h5>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form wire:submit.prevent="store">
                        <div class="row g-4">
                            <!-- Nama Barang -->
                            <div class="col-lg-6">
                                <label for="nama" class="form-label fw-semibold text-dark">
                                    <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    Nama Barang
                                </label>
                                <input type="text" class="form-control border-0 bg-light @error('nama') is-invalid @enderror" id="nama" wire:model="nama" placeholder="Masukkan nama barang">
                                @error('nama') 
                                    <div class="invalid-feedback d-flex align-items-center">
                                        <svg class="me-1" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </div> 
                                @enderror
                            </div>

                            <!-- Kode Barang -->
                            <div class="col-lg-6">
                                <label for="kode_barang" class="form-label fw-semibold text-dark">
                                    <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                    </svg>
                                    Kode Barang
                                </label>
                                <input type="text" class="form-control border-0 bg-light @error('kode_barang') is-invalid @enderror" id="kode_barang" wire:model="kode_barang" placeholder="Masukkan kode barang">
                                @error('kode_barang') 
                                    <div class="invalid-feedback d-flex align-items-center">
                                        <svg class="me-1" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </div> 
                                @enderror
                            </div>

                            <!-- Kategori -->
                            <div class="col-lg-6">
                                <label for="kategori_id" class="form-label fw-semibold text-dark">
                                    <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    Kategori
                                </label>
                                <select class="form-select border-0 bg-light @error('kategori_id') is-invalid @enderror" id="kategori_id" wire:model="kategori_id">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id') 
                                    <div class="invalid-feedback d-flex align-items-center">
                                        <svg class="me-1" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </div> 
                                @enderror
                            </div>

                            <!-- Lokasi -->
                            <div class="col-lg-6">
                                <label for="lokasi_id" class="form-label fw-semibold text-dark">
                                    <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Lokasi
                                </label>
                                <select class="form-select border-0 bg-light @error('lokasi_id') is-invalid @enderror" id="lokasi_id" wire:model="lokasi_id">
                                    <option value="">Pilih Lokasi</option>
                                    @foreach ($lokasis as $lokasi)
                                        <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                                    @endforeach
                                </select>
                                @error('lokasi_id') 
                                    <div class="invalid-feedback d-flex align-items-center">
                                        <svg class="me-1" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </div> 
                                @enderror
                            </div>

                            <!-- Jumlah -->
                            <div class="col-lg-12">
                                <label for="jumlah" class="form-label fw-semibold text-dark">
                                    <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    Jumlah
                                </label>
                                <input type="number" class="form-control border-0 bg-light @error('jumlah') is-invalid @enderror" id="jumlah" wire:model="jumlah" placeholder="Masukkan jumlah barang" min="0">
                                @error('jumlah') 
                                    <div class="invalid-feedback d-flex align-items-center">
                                        <svg class="me-1" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </div> 
                                @enderror
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
                        <button type="submit" wire:click="store" class="btn btn-success fw-semibold">
                            <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Barang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>