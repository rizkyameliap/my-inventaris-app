<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Inventaris</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles & Scripts from Vite (akan bundling Tailwind CSS) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    {{-- Menggunakan kelas Tailwind dari app.css yang dibundel oleh Vite --}}
    <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ route('dashboard') }}" {{-- Diarahkan ke rute dashboard --}}
                            class="inline-block px-5 py-1.5 dark:text-white border border-gray-300 hover:border-gray-400 dark:border-gray-700 dark:hover:border-gray-600 rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-white text-gray-900 border border-transparent hover:border-gray-300 dark:hover:border-gray-700 rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-white border border-gray-300 hover:border-gray-400 dark:border-gray-700 dark:hover:border-gray-600 rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                <div class="text-sm flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-gray-800 dark:text-white shadow-sm rounded-es-lg rounded-ee-lg lg:rounded-ss-lg lg:rounded-ee-none">
                    <h1 class="mb-1 font-medium">Selamat Datang di Aplikasi Inventaris!</h1>
                    <p class="mb-2 text-gray-700 dark:text-gray-400">
                        Aplikasi ini dibangun dengan Laravel 12 dan Livewire 3.
                        Silakan login atau daftar untuk memulai.
                    </p>
                    <ul class="flex flex-col mb-4 lg:mb-6">
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-gray-200 dark:before:border-gray-700 before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-gray-800">
                                <span class="flex items-center justify-center rounded-full bg-gray-50 dark:bg-gray-800 shadow-sm w-3.5 h-3.5 border dark:border-gray-700 border-gray-200">
                                    <span class="rounded-full bg-gray-300 dark:bg-gray-600 w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Belajar lebih lanjut tentang
                                <a href="https://laravel.com/docs" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-blue-600 dark:text-blue-400 ms-1">
                                    <span>Laravel Docs</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-gray-200 dark:before:border-gray-700 before:bottom-1/2 before:top-0 before:start-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-gray-800">
                                <span class="flex items-center justify-center rounded-full bg-gray-50 dark:bg-gray-800 shadow-sm w-3.5 h-3.5 border dark:border-gray-700 border-gray-200">
                                    <span class="rounded-full bg-gray-300 dark:bg-gray-600 w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Tonton tutorial di
                                <a href="https://laracasts.com" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-blue-600 dark:text-blue-400 ms-1">
                                    <span>Laracasts</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                    </ul>
                    <ul class="flex gap-3 text-sm leading-normal">
                        <li>
                            <a href="https://cloud.laravel.com" target="_blank" class="inline-block dark:bg-gray-700 dark:border-gray-700 dark:text-white dark:hover:bg-gray-600 dark:hover:border-gray-600 hover:bg-black hover:border-black px-5 py-1.5 bg-gray-900 rounded-sm border border-gray-900 text-white text-sm leading-normal">
                                Deploy sekarang
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bg-gray-200 dark:bg-gray-900 relative lg:-ms-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-e-lg! aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">
                    {{-- Logo Laravel (biarkan aslinya, atau ganti jika ingin) --}}
                    {{-- Biasanya SVG ini sudah ditangani oleh asset bundling Vite --}}
                    {{-- Jadi, jika ada masalah render, bisa dihapus atau diganti dengan <img src="/path/to/your/logo.png"> --}}
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif

        @livewireScripts
    </body>
</html>
