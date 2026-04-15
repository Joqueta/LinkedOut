<div class="space-y-4">

    <div class="bg-white rounded-lg shadow-md overflow-hidden sticky top-20">
        <div class="bg-linkedout-500 px-4 py-3">
            <h3 class="text-white font-semibold text-sm flex items-center space-x-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                </svg>
                <span>Top Losers du mois</span>
            </h3>
        </div>

        <div class="divide-y divide-gray-200">
            @php
            // Mock data - à remplacer par une vraie requête DB
            $topLosers = [
            ['name' => 'Jean-Michel Dupont', 'fiertés' => 127, 'badge' => '💎', 'avatar' => null],
            ['name' => 'Marie Lachance', 'fiertés' => 89, 'badge' => '🥇', 'avatar' => null],
            ['name' => 'Patrick Ratage', 'fiertés' => 76, 'badge' => '🥇', 'avatar' => null],
            ['name' => 'Sophie Malchance', 'fiertés' => 52, 'badge' => '🥈', 'avatar' => null],
            ['name' => 'Vous', 'fiertés' => Auth::user()->posts()->count() ?? 3, 'badge' => '🥉', 'current' => true],
            ];
            @endphp

            @foreach($topLosers as $index => $loser)
            <div class="px-4 py-3 hover:bg-gray-50 transition {{ $loser['current'] ?? false ? 'bg-failure-light' : '' }}">
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0 w-6 text-center">
                        @if($index === 0)
                        <span class="text-lg">👑</span>
                        @else
                        <span class="text-sm font-bold text-gray-400">#{{ $index + 1 }}</span>
                        @endif
                    </div>

                    <img
                        src="{{ $loser['avatar'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($loser['name']) . '&background=random&size=64' }}"
                        alt="{{ $loser['name'] }}"
                        class="w-10 h-10 rounded-full {{ ($loser['current'] ?? false) ? 'ring-2 ring-failure' : '' }}" />

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate {{ ($loser['current'] ?? false) ? 'font-bold' : '' }}">
                            {{ $loser['name'] }}
                        </p>
                        <p class="text-xs text-gray-500">
                            {{ $loser['badge'] }} {{ $loser['fiertés'] }} fiertés
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <a href="{{ route('ranking') }}" class="block px-4 py-3 text-center text-sm font-medium text-linkedout-500 hover:bg-gray-50 transition border-t border-gray-200">
            Voir le classement complet
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-4 py-3 border-b border-gray-200">
            <h3 class="font-semibold text-gray-900 text-sm">LinkedOut Actu 📰</h3>
        </div>

        <div class="divide-y divide-gray-200">
            <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition">
                <p class="text-xs font-medium text-gray-900">Le burn-out est-il le nouveau burn-in ?</p>
                <p class="text-xs text-gray-500 mt-1">42 lecteurs désespérés · Il y a 2h</p>
            </a>

            <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition">
                <p class="text-xs font-medium text-gray-900">10 façons de rater un entretien (et on les a toutes testées)</p>
                <p class="text-xs text-gray-500 mt-1">3 ponts brûlés · Il y a 5h</p>
            </a>

            <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition">
                <p class="text-xs font-medium text-gray-900">Mon chef m'a demandé de démissionner : témoignage</p>
                <p class="text-xs text-gray-500 mt-1">567 😬 · Il y a 1j</p>
            </a>
        </div>

        <button class="w-full px-4 py-3 text-center text-xs font-medium text-gray-600 hover:bg-gray-50 transition border-t border-gray-200">
            Afficher plus d'actualités déprimantes
        </button>
    </div>

    <div class="text-center px-4 py-2">
        <div class="flex flex-wrap justify-center gap-x-3 gap-y-1 text-xs text-gray-500">
            <a href="#" class="hover:text-linkedout-500 hover:underline">À propos</a>
            <a href="#" class="hover:text-linkedout-500 hover:underline">Conditions d'échec</a>
            <a href="#" class="hover:text-linkedout-500 hover:underline">Confidentialité (lol)</a>
        </div>
        <p class="text-xs text-gray-400 mt-2">
            LinkedOut Corporation © 2025<br />
            <span class="italic">Parce que l'échec mérite aussi son réseau</span>
        </p>
    </div>

</div>