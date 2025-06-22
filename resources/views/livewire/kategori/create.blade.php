<x-layouts.app>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <a href="{{ route('kategori.index') }}" class="btn btn-light me-3">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="fw-bold text-dark mb-0">
                {{ __('Tambah Kategori Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container-fluid">
            <!-- Header Section -->
            <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);">
                <div class="card-body p-4 text-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bold mb-2">Buat Kategori Baru</h3>
                            <p class="mb-0 opacity-75 fs-6">Tambahkan kategori untuk mengorganisir barang dengan lebih baik</p>
                        </div>
                        <div class="bg-white bg-opacity-20 p-3 rounded-3">
                            <svg class="text-white" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Form Card -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                                    <svg class="text-primary" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <h5 class="fw-bold text-dark mb-0">Informasi Kategori</h5>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <form action="{{ route('kategori.store') }}" method="POST">
                                @csrf
                                
                                <!-- Nama Kategori -->
                                <div class="mb-4">
                                    <label for="nama_kategori" class="form-label fw-semibold text-dark">
                                        Nama Kategori <span class="text-danger">*</span>
                                    </label>
                                    <div class="position-relative">
                                        <input type="text" 
                                               class="form-control border-0 bg-light @error('nama_kategori') is-invalid @enderror" 
                                               id="nama_kategori" 
                                               name="nama_kategori" 
                                               value="{{ old('nama_kategori') }}"
                                               placeholder="Masukkan nama kategori"
                                               style="height: 48px;">
                                        <div class="position-absolute top-50 end-0 translate-middle-y me-3">
                                            <svg class="text-muted" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('nama_kategori')
                                        <div class="invalid-feedback d-block">
                                            <div class="d-flex align-items-center">
                                                <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-4">
                                    <label for="deskripsi" class="form-label fw-semibold text-dark">
                                        Deskripsi
                                    </label>
                                    <textarea class="form-control border-0 bg-light @error('deskripsi') is-invalid @enderror" 
                                              id="deskripsi" 
                                              name="deskripsi" 
                                              rows="4"
                                              placeholder="Masukkan deskripsi kategori (opsional)">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback d-block">
                                            <div class="d-flex align-items-center">
                                                <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary me-2">
                                        <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Batal
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- end container-fluid -->
    </div> <!-- end py-4 -->
</x-layouts.app>
