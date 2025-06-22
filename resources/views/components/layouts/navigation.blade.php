<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container-fluid">
        <!-- Logo/Brand -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <x-app-logo class="me-2" style="height: 32px;" />
            <span class="fw-bold text-dark">Inventaris App</span>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('dashboard') ? 'active text-primary' : 'text-dark' }}" 
                       href="{{ route('dashboard') }}">
                        <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('barang.*') ? 'active text-primary' : 'text-dark' }}" 
                       href="{{ route('barang.index') }}">
                        <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        {{ __('Barang') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('kategori.*') ? 'active text-primary' : 'text-dark' }}" 
                    href="{{ route('kategori.index') }}">
                        <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        {{ __('Kategori') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('lokasi.*') ? 'active text-primary' : 'text-dark' }}" 
                       href="{{ route('lokasi.index') }}">
                        <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ __('Lokasi') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('laporan.*') ? 'active text-primary' : 'text-dark' }}" 
                       href="{{ route('laporan.barang-aktif') }}">
                        <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        {{ __('Laporan') }}
                    </a>
                </li>
            </ul>

            <!-- User Dropdown -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center" 
                        type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2">
                        <svg width="16" height="16" fill="currentColor" class="text-primary" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </div>
                    <span class="fw-semibold text-dark">{{ Auth::user()->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userDropdown">
                    <li>
                        <div class="dropdown-item-text">
                            <div class="fw-semibold text-dark">{{ Auth::user()->name }}</div>
                            <div class="small text-muted">{{ Auth::user()->email }}</div>
                        </div>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <svg class="me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>