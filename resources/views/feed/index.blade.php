<x-layouts.app>
    <x-card class="mb-6">
        <div class="flex items-start space-x-3">
            <img
                src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=dc2626&color=fff&size=128' }}"
                alt="{{ Auth::user()->name }}"
                class="w-12 h-12 rounded-full" />
            <div class="flex-1">
                <textarea
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-linkedout-400 resize-none"
                    rows="3"
                    placeholder="Fier d'annoncer que j'ai encore raté quelque chose aujourd'hui..."></textarea>
                <div class="flex items-center justify-between mt-3">
                    <div class="flex items-center space-x-2 text-gray-500">
                        <button class="p-2 hover:bg-gray-100 rounded-full transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="p-2 hover:bg-gray-100 rounded-full transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <x-button variant="primary">
                        Partager mon échec
                    </x-button>
                </div>
            </div>
        </div>
    </x-card>

    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center space-x-2">
            <button class="px-3 py-1.5 text-sm font-medium bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                Plus récents
            </button>
            <button class="px-3 py-1.5 text-sm font-medium text-gray-600 hover:bg-white hover:border hover:border-gray-300 rounded-md">
                Plus honteux
            </button>
        </div>
    </div>

    <div class="space-y-4">
        @php
        $mockPosts = [
        [
        'author' => 'Jean-Michel Ratage',
        'avatar' => null,
        'time' => 'Il y a 2h',
        'badge' => '💎 VP de l\'Inutile',
        'content' => 'Fier d\'annoncer que j\'ai oublié de couper mon micro pendant une réunion importante. Après 15 minutes à insulter mon chat, j\'ai décidé de démissionner avant d\'être viré. Je suis maintenant à la recherche active d\'un nouveau chat qui ne me juge pas. #OpenToAnything #SVPAidezMoi',
        'reactions' => ['😬' => 42, '🤣' => 18, '🕯️' => 3]
        ],
        [
        'author' => 'Sophie Malchance',
        'avatar' => null,
        'time' => 'Il y a 5h',
        'badge' => '🥇 Manager Sans Équipe',
        'content' => 'Fier d\'annoncer que mon équipe entière a démissionné le même jour. Après 6 mois de management toxique involontaire, j\'ai décidé de suivre une formation en communication. Je suis maintenant seule dans un bureau pour 8 personnes. #Présent #ManagerLife',
        'reactions' => ['😬' => 67, '👎' => 23, '🫡' => 12]
        ],
        [
        'author' => 'Patrick Désespoir',
        'avatar' => null,
        'time' => 'Il y a 1j',
        'badge' => '🥈 Coordinateur de Rien',
        'content' => 'Fier d\'annoncer que j\'ai raté ma présentation devant le board. Après avoir confondu les slides de mon projet avec celles de mes dernières vacances à Deauville, j\'ai décidé de prendre un congé sabbatique non rémunéré. Je suis maintenant expert en PowerPoint (version 2003). #Désolé #PasDoué',
        'reactions' => ['🤣' => 156, '😬' => 89, '🕯️' => 5]
        ]
        ];
        @endphp

        @foreach($mockPosts as $post)
        <x-card class="card-hover">
            <div class="flex items-start justify-between mb-3">
                <div class="flex items-start space-x-3">
                    <img
                        src="{{ $post['avatar'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($post['author']) . '&background=random&size=128' }}"
                        alt="{{ $post['author'] }}"
                        class="w-12 h-12 rounded-full" />
                    <div>
                        <h4 class="font-semibold text-gray-900">{{ $post['author'] }}</h4>
                        <p class="text-xs text-gray-500">{{ $post['badge'] }}</p>
                        <p class="text-xs text-gray-400">{{ $post['time'] }}</p>
                    </div>
                </div>
                <button class="p-1 hover:bg-gray-100 rounded-full">
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                    </svg>
                </button>
            </div>

            <p class="text-gray-800 leading-relaxed mb-4">
                {{ $post['content'] }}
            </p>

            <div class="flex items-center justify-between py-2 border-t border-b border-gray-200 mb-3">
                <div class="flex items-center space-x-1 text-sm text-gray-600">
                    @foreach($post['reactions'] as $emoji => $count)
                    <span>{{ $emoji }}</span>
                    @endforeach
                    <span>{{ array_sum($post['reactions']) }}</span>
                </div>
                <div class="flex items-center space-x-4 text-sm text-gray-600">
                    <span>{{ rand(5, 50) }} commentaires</span>
                    <span>{{ rand(1, 20) }} partages</span>
                </div>
            </div>

            <div class="flex items-center justify-around">
                @foreach(['😬' => 'Gêné', '👎' => 'Pas terrible', '🫡' => 'Courage', '🤣' => 'LOL', '🕯️' => 'Condoléances'] as $emoji => $label)
                <button class="reaction-btn">
                    <span>{{ $emoji }}</span>
                    <span>{{ $label }}</span>
                </button>
                @endforeach
            </div>
        </x-card>
        @endforeach
    </div>

    <div class="text-center mt-6">
        <x-button variant="outline" size="lg">
            Charger plus d'échecs
        </x-button>
    </div>

</x-layouts.app>