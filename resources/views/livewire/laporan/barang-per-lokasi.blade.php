<div class="py-4">
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%);">
            <div class="card-body p-4 text-white">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bold mb-2">Laporan Barang per Lokasi</h3>
                        <p class="mb-0 opacity-75 fs-6">Menampilkan total jumlah barang di setiap lokasi</p>
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

        <!-- Summary Statistics -->
        <div class="row g-4 mb-4">
            <!-- Total Lokasi Card -->
            <div class="col-lg-6 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted small fw-semibold mb-1">Total Lokasi</p>
                                <h3 class="fw-bold text-dark mb-0">{{ $lokasiDenganJumlahBarang->count() }}</h3>
                            </div>
                            <div class="bg-warning bg-opacity-10 p-3 rounded-3">
                                <svg class="text-warning" width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h1a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Barang Keseluruhan Card -->
            <div class="col-lg-6 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted small fw-semibold mb-1">Total Barang Keseluruhan</p>
                                <h3 class="fw-bold text-dark mb-0">{{ $lokasiDenganJumlahBarang->sum('barang_sum_jumlah') }}</h3>
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

        <!-- Table Section -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold text-dark mb-0">Distribusi Barang per Lokasi</h5>
                    <div class="bg-light p-2 rounded-3">
                        <svg class="text-muted" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">No</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Nama Lokasi</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Gedung</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Total Jumlah Barang</th>
                                <th class="border-0 fw-semibold text-muted small text-uppercase py-3">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalBarangKeseluruhan = $lokasiDenganJumlahBarang->sum('barang_sum_jumlah');
                            @endphp
                            @forelse ($lokasiDenganJumlahBarang as $lokasi)
                                @php
                                    $jumlahBarang = $lokasi->barang_sum_jumlah ?? 0;
                                    $persentase = $totalBarangKeseluruhan > 0 ? ($jumlahBarang / $totalBarangKeseluruhan) * 100 : 0;
                                @endphp
                                <tr>
                                    <td class="border-0 py-3">
                                        <span class="text-muted">{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="border-0 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                                            <div class="fw-semibold text-dark">{{ $lokasi->nama_lokasi }}</div>
                                        </div>
                                    </td>
                                    <td class="border-0 py-3">
                                        @if($lokasi->gedung)
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary">
                                                {{ $lokasi->gedung }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="border-0 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-dark me-3">{{ number_format($jumlahBarang) }}</div>
                                            <div class="progress flex-grow-1" style="height: 6px; max-width: 100px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ min($persentase, 100) }}%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-0 py-3">
                                        <span class="badge bg-success bg-opacity-10 text-success">
                                            {{ number_format($persentase, 1) }}%
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border-0 text-center py-5">
                                        <div class="d-flex flex-column align-items-center">
                                            <svg class="text-muted mb-3" width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <p class="text-muted fs-5 fw-semibold mb-1">Tidak ada data lokasi ditemukan</p>
                                            <p class="text-muted small mb-0">Data lokasi akan muncul di sini setelah ditambahkan</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>