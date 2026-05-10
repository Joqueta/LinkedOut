
    @auth

<div class="bg-white rounded-lg shadow-md overflow-hidden sticky top-20">
    <div class="h-16 bg-gradient-to-r from-linkedout-400 to-linkedout-600 relative">
        <div class="absolute -bottom-10 left-1/2 transform -translate-x-1/2">
            <img
                src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=dc2626&color=fff&size=128' }}"
                alt="{{ Auth::user()->name }}"
                class="w-20 h-20 rounded-full border-4 border-white shadow-lg grayscale hover:grayscale-0 transition-all"
                title="Photo un lundi matin" />
        </div>
    </div>

    <div class="pt-12 pb-4 px-4 text-center border-b border-gray-200">
        <h3 class="font-semibold text-gray-900 text-lg">
            {{ Auth::user()->name }}
        </h3>
        <p class="text-sm text-gray-500 mt-1 italic">
            {{ Auth::user()->current_fail ?? 'En recherche active de nouvelles opportunités d\'échec' }}
        </p>
    </div>
    
    
    <div class="px-4 py-3 border-b border-gray-200">
        <div class="flex justify-between items-center text-xs text-gray-600 mb-2">
            <span>Visiteurs du profil</span>
            <span class="font-semibold text-failure">{{ rand(0, 3) }}</span>
        </div>
        <div class="flex justify-between items-center text-xs text-gray-600">
            <span>Ponts brûlés</span>
            <span class="font-semibold text-failure">{{ Auth::user()->ponts_brules ?? 0 }}</span>
        </div>
    </div>
    @endauth

    <div class="px-4 py-3 border-b border-gray-200">
        <div class="flex items-center space-x-2">
            
            <div class="flex-1">
                {{-- <p class="text-xs font-semibold text-gray-700">{{ $badgeName }}</p>
                <p class="text-xs text-gray-500">{{ $fiertesCount }} fiertés publiées</p> --}}
            </div>
        </div>
    </div>

    {{-- <a href="{{ route('profile.show', Auth::id()) }}" class="block px-4 py-3 text-center text-sm font-medium text-linkedout-500 hover:bg-gray-50 transition">
        Voir mon CV catastrophique
    </a> --}}

    <div class="bg-gradient-to-br from-shame-light to-failure-light px-4 py-3 border-t border-gray-200">
        <div class="flex items-start space-x-2">
            <svg class="w-5 h-5 text-shame flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            <div>
                <p class="text-xs font-semibold text-gray-800">Essayer LinkedOut Premium</p>
                <p class="text-xs text-gray-600 mt-1">Partagez vos échecs avec encore moins de visibilité</p>
                <button class="mt-2 text-xs font-medium text-linkedout-600 hover:underline">
                    Non merci, je suis déjà assez bas
                </button>
            </div>
        </div>
    </div>
</div>