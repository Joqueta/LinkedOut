<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LinkedOut') }} - {{ $title ?? 'Le réseau social de l\'échec professionnel' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 antialiased">
    <!-- Navbar -->
    <x-navbar />

    <!-- Container Principal -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- Sidebar Gauche (Profil) -->
            <aside class="lg:col-span-3 hidden lg:block">
                <x-sidebar-left />
            </aside>

            <!-- Contenu Principal -->
            <main class="lg:col-span-6">
                {{ $slot }}
            </main>

            <!-- Sidebar Droite (Classement) -->
            <aside class="lg:col-span-3 hidden lg:block">
                <x-sidebar-right />
            </aside>

        </div>
    </div>

    <!-- Notifications Toast (optionnel) -->
    <div id="toast-container" class="fixed bottom-4 right-4 z-50 space-y-2">
        <!-- Les notifications Livewire apparaîtront ici -->
    </div>

    @livewireScripts
</body>

</html>