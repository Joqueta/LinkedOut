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
    <x-navbar />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

            <!-- Sidebar gauche -->
            <aside class="hidden lg:block lg:col-span-3">
                <div class="sticky top-24">
                    <x-sidebar-left />
                </div>
            </aside>

            <!-- Contenu principal -->
            <main class="lg:col-span-6">
                {{ $slot }}
            </main>

            <!-- Sidebar droite -->
            <aside class="hidden lg:block lg:col-span-3">
                <div class="sticky top-24">
                    <x-sidebar-right />
                </div>
            </aside>

        </div>
    </div>

    <div id="toast-container" class="fixed bottom-4 right-4 z-50 space-y-2"></div>

    @livewireScripts
</body>
</html>