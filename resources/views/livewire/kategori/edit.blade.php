<x-layouts.app>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <a href="{{ route('kategori.index') }}" class="btn btn-light me-3">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="fw-bold text-dark mb-0">
                {{ __('Edit Kategori') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom">
                            <h5 class="fw-bold text-dark mb-0">Form Edit Kategori</h5>
                        </div>

                        <div class="card-body p-4">
                            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="nama_kategori" class="form-label fw-semibold text-dark">
                                        Nama Kategori <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="nama_kategori" id="nama_kategori"
                                           class="form-control border-0 bg-light @error('nama_kategori') is-invalid @enderror"
                                           value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                                           placeholder="Masukkan nama kategori" style="height: 48px;">
                                    @error('nama_kategori')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="deskripsi" class="form-label fw-semibold text-dark">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="4"
                                              class="form-control border-0 bg-light @error('deskripsi') is-invalid @enderror"
                                              placeholder="Masukkan deskripsi (opsional)">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary me-2">Batal</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</x-layouts.app>
