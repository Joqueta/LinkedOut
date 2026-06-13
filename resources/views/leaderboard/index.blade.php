<x-layouts.app title="Classement">
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="bg-red-500 px-6 py-4">
            <h1 class="text-white font-bold text-xl flex items-center gap-2">
                👑 Classement du mois
            </h1>
            <p class="text-red-100 text-sm mt-1">Les plus grands losers de {{ now()->translatedFormat('F Y') }}</p>
        </div>

        <div class="divide-y divide-gray-100">
            @forelse ($topUsers as $index => $user)
            <div class="flex items-center gap-4 px-6 py-4 hover:bg-gray-50 transition {{ $index === 0 ? 'bg-yellow-50' : '' }}">
                <div class="w-8 text-center shrink-0">
                    @if ($index === 0)
                    <span class="text-2xl">👑</span>
                    @elseif ($index === 1)
                    <span class="text-xl">🥈</span>
                    @elseif ($index === 2)
                    <span class="text-xl">🥉</span>
                    @else
                    <span class="text-sm font-bold text-gray-400">#{{ $index + 1 }}</span>
                    @endif
                </div>

                <img
                    src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=dc2626&color=fff&size=64' }}"
                    alt="{{ $user->name }}"
                    class="w-10 h-10 rounded-full object-cover">

                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-900 truncate">
                        {{ $user->name }}
                        @if ($index === 0)
                        <span class="ml-1 text-xs bg-yellow-100 text-yellow-800 border border-yellow-300 rounded-full px-2 py-0.5">Chief Disappointment Officer</span>
                        @endif
                    </p>
                    <p class="text-xs text-gray-500">{{ $user->posts_this_month }} post(s) ce mois-ci</p>
                </div>

                <div class="text-right shrink-0">
                    <p class="text-lg font-bold text-red-500">{{ $user->posts_this_month }}</p>
                    <p class="text-xs text-gray-400">fiertés</p>
                </div>
            </div>
            @empty
            <div class="text-center py-12 text-gray-400">
                <p class="text-lg">Aucun loser ce mois-ci.</p>
                <p class="text-sm">Sois le premier à te ridiculiser 😬</p>
            </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>