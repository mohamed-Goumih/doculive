<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @livewireStyles
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <li class="nav-item dropdown">
            <a class="nav-link position-relative" href="#" id="notifDropdown" data-bs-toggle="dropdown">
                🔔 <span class="badge bg-danger" id="notif-count">0</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li id="notif-list" class="p-2 text-muted">Aucune notification</li>
            </ul>
        </li>
        
        @livewireScripts
        {{-- <script>
            window.addEventListener('toast', event => {
                showToast(event.detail.message, event.detail.type || 'info');
            });
        </script> --}}
        
    </body>
</html>
