
   <x-layouts.app :title="$user->name">

    <div class="max-w-4xl mx-auto space-y-6">

        {{-- Profile Header --}}
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">

            {{-- Cover --}}
            <div class="h-40 bg-gradient-to-r from-red-500 to-red-700"></div>

            <div class="px-6 pb-6">

                {{-- Avatar --}}
                <div class="-mt-16 mb-4">
                    <img
                        src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=dc2626&color=fff&size=256' }}"
                        alt="{{ $user->name }}"
                        class="w-32 h-32 rounded-full border-4 border-white shadow-lg object-cover"
                    >
                </div>

                {{-- User Info --}}
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">
                            {{ $user->name }}
                        </h1>

                        <p class="text-gray-500 mt-1">
                            @if($user->company)
                                {{ $user->company->name }}
                            @else
                                Professionnel certifié de l’échec.
                            @endif
                        </p>

                        <p class="text-sm text-gray-400 mt-2">
                            Membre depuis {{ $user->created_at->format('F Y') }}
                        </p>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-3">

                        <button
                            class="px-5 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-100 transition"
                        >
                            Suivre
                        </button>

                        <button
                            class="px-5 py-2.5 rounded-xl bg-red-500 hover:bg-red-600 text-white transition"
                        >
                            Envoyer un message
                        </button>

                    </div>

                </div>

            </div>

        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div class="bg-white rounded-2xl shadow-md p-5">
                <p class="text-sm text-gray-500">
                    Échecs publiés
                </p>

                <h3 class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $user->posts->count() }}
                </h3>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-5">
                <p class="text-sm text-gray-500">
                    Commentaires
                </p>

                <h3 class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $user->comment->count() }}
                </h3>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-5">
                <p class="text-sm text-gray-500">
                    Niveau de honte
                </p>

                <h3 class="text-3xl font-bold text-red-500 mt-2">
                    Expert
                </h3>
            </div>

        </div>

        {{-- Posts --}}
        <div class="space-y-4">

            <h2 class="text-2xl font-bold text-gray-900">
                Derniers échecs publiés
            </h2>

            @forelse ($user->posts->sortByDesc('created_at') as $post)

                <div class="bg-white rounded-2xl shadow-md p-5">

                    <div class="flex items-center justify-between mb-3">

                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">
                                {{ $post->title }}
                            </h3>

                            <p class="text-sm text-gray-400">
                                {{ $post->created_at->diffForHumans() }}
                            </p>
                        </div>

                    </div>

                    <p class="text-gray-700 leading-relaxed">
                        {{ $post->content }}
                    </p>

                    <div class="flex items-center gap-4 mt-4 text-sm text-gray-500">
                        <span>
                            {{ $post->comment->count() }} commentaires
                        </span>

                        <span>
                            {{ rand(1, 20) }} réactions
                        </span>
                    </div>

                </div>

            @empty

                <div class="bg-white rounded-2xl shadow-md p-6 text-center text-gray-500">
                    Aucun échec publié pour le moment.
                </div>

            @endforelse

        </div>

    </div>

</x-layouts.app>

