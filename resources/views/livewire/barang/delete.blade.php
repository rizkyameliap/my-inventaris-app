<!-- Modal Konfirmasi Penghapusan dengan desain modern -->
<div class="modal fade show" tabindex="-1" role="dialog" style="display: {{ $showModal ? 'block' : 'none' }}; background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg">
            <!-- Modal Header -->
            <div class="modal-header border-0 pb-0" style="background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);">
                <div class="d-flex align-items-center w-100 text-white p-3">
                    <div class="bg-white bg-opacity-20 p-2 rounded-3 me-3">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.348 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="modal-title fw-bold mb-1">Konfirmasi Penghapusan Barang</h5>
                        <p class="mb-0 opacity-75 small">Tindakan ini tidak dapat dibatalkan</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white" wire:click="closeModal" aria-label="Close"></button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <!-- Error Alert -->
                @if (session()->has('error'))
                    <div class="alert alert-danger border-0 shadow-sm mb-4" role="alert">
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
                    </div>
                @endif

                <p>Apakah Anda yakin ingin menghapus barang <strong>{{ $namaBarang ?? 'Barang' }}</strong>?</p>

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-0 justify-content-end px-4 pb-4">
                <button type="button" class="btn btn-secondary" wire:click="closeModal">Batal</button>
                <button type="button" class="btn btn-danger" wire:click="deleteBarang({{ $barangId }})">Hapus</button>
            </div>
        </div>
    </div>
</div>
