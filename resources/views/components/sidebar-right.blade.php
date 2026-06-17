<div class="space-y-4">

    {{-- Top Losers --}}
    <div class="bg-white rounded-lg shadow-md overflow-hidden sticky top-20">
        <div class="bg-linkedout-500 px-4 py-3">
            <h3 class="text-black font-semibold text-sm flex items-center space-x-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                </svg>
                <span>Top Losers du mois</span>
            </h3>
        </div>

        <div class="divide-y divide-gray-200">
            @auth
            @php
            $topLosers = \App\Http\Controllers\LeaderboardController::getTopUsers(5);
            @endphp

            @foreach($topLosers as $index => $user)
            <div class="px-4 py-3 hover:bg-gray-50 transition {{ auth()->id() === $user->id ? 'bg-red-50' : '' }}">
                <div class="flex items-center space-x-3">
                    <div class="shrink-0 w-6 text-center">
                        @if($index === 0)
                        <span class="text-lg">👑</span>
                        @else
                        <span class="text-sm font-bold text-gray-400">#{{ $index + 1 }}</span>
                        @endif
                    </div>

                    <img
                        src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=dc2626&color=fff&size=64' }}"
                        alt="{{ $user->name }}"
                        class="w-10 h-10 rounded-full {{ auth()->id() === $user->id ? 'ring-2 ring-red-500' : '' }}">

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate {{ auth()->id() === $user->id ? 'font-bold' : '' }}">
                            {{ auth()->id() === $user->id ? 'Vous' : $user->name }}
                        </p>
                        <p class="text-xs text-gray-500">{{ $user->posts_this_month }} fiertés</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endauth

            <a href="{{ route('leaderboard') }}" class="block px-4 py-3 text-center text-sm font-medium text-red-500 hover:bg-gray-50 transition border-t border-gray-200">
                Voir le classement complet →
            </a>
        </div>
    </div>

    {{-- Actu --}}
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

    {{-- Footer --}}
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