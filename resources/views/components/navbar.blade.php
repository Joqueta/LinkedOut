<nav class="bg-linkedout-500 border-b border-linkedout-600 sticky top-0 z-40 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <div class="flex items-center space-x-8">
                <a href="{{ route('feed') }}" class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z" />
                        <line x1="4" y1="4" x2="20" y2="20" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <span class="text-white text-xl font-bold tracking-tight">
                        Linked<span class="text-failure-light">Out</span>
                    </span>
                </a>

                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('feed') }}" class="nav-link {{ request()->routeIs('feed') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span>Fiertés</span>
                    </a>

                    <a href="{{ route('profile.show', Auth::id()) }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        <span>Profil</span>
                    </a>

                    <a href="{{ route('ranking') }}" class="nav-link {{ request()->routeIs('ranking') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                        </svg>
                        <span>Losers</span>
                    </a>

                    <a href="{{ route('jobs') }}" class="nav-link {{ request()->routeIs('jobs') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                        <span>Jobs horribles</span>
                    </a>
                </div>
            </div>

            <div class="hidden md:block flex-1 max-w-md mx-4">
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Chercher des échecs..."
                        class="w-full bg-linkedout-600 text-white placeholder-linkedout-200 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-linkedout-400" />
                    <svg class="absolute right-3 top-2.5 w-5 h-5 text-linkedout-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button class="relative p-2 text-white hover:bg-linkedout-600 rounded-full transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                    </svg>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-failure rounded-full"></span>
                </button>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 hover:bg-linkedout-600 rounded-lg px-2 py-1 transition">
                        <img
                            src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=dc2626&color=fff' }}"
                            alt="{{ Auth::user()->name }}"
                            class="w-8 h-8 rounded-full border-2 border-white" />
                        <span class="hidden md:block text-white text-sm font-medium">Moi 😔</span>
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                        <a href="{{ route('profile.show', Auth::id()) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mon profil catastrophique</a>
                        <a href="{{ route('settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Paramètres</a>
                        <hr class="my-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-failure hover:bg-gray-100">
                                Abandonner (Déconnexion)
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>

<style>
    .nav-link {
        @apply flex items-center space-x-2 text-linkedout-100 hover:text-white px-3 py-2 rounded-md transition;
    }

    .nav-link.active {
        @apply text-white bg-linkedout-600;
    }
</style>
<script src="//unpkg.com/alpinejs" defer></script>