<div class="py-4">
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);">
            <div class="card-body p-4 text-white">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-3 me-3">
                        <svg class="text-white" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-1">Edit Lokasi</h3>
                        <p class="mb-0 opacity-75">Perbarui informasi lokasi penyimpanan barang</p>
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
                            <div class="bg-warning bg-opacity-10 p-2 rounded-3 me-3">
                                <svg class="text-warning" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h5 class="fw-bold text-dark mb-0">Formulir Edit Lokasi</h5>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form wire:submit.prevent="update">
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
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-secondary me-2" wire:click="cancel">
                                    <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Batal
                                </button>
                                <button type="submit" class="btn btn-warning text-white">
                                    <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container-fluid -->
</div> <!-- end py-4 -->
