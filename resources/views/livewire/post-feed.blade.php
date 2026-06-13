<div>
    {{-- Filtres --}}
    <div class="flex items-center justify-between mb-4 flex-wrap gap-3">
        <div class="flex items-center gap-2">
            <button wire:click="$set('filter', 'all')"
                class="px-3 py-1.5 text-sm font-medium rounded-md border transition
                    {{ $filter === 'all' ? 'bg-red-500 text-white border-red-500' : 'bg-white border-gray-300 text-gray-600 hover:bg-gray-50' }}">
                Tous
            </button>
            @foreach ($types as $type)
            <button wire:click="$set('filter', '{{ $type->name }}')"
                class="px-3 py-1.5 text-sm font-medium rounded-md border transition
                    {{ $filter === $type->name ? 'bg-red-500 text-white border-red-500' : 'bg-white border-gray-300 text-gray-600 hover:bg-gray-50' }}">
                {{ $type->name }}
            </button>
            @endforeach
        </div>

        <div class="flex items-center gap-2">
            <button wire:click="$set('sort', 'recent')"
                class="px-3 py-1.5 text-sm font-medium rounded-md border transition
                    {{ $sort === 'recent' ? 'bg-gray-800 text-white border-gray-800' : 'bg-white border-gray-300 text-gray-600 hover:bg-gray-50' }}">
                Plus récents
            </button>
            <button wire:click="$set('sort', 'honteux')"
                class="px-3 py-1.5 text-sm font-medium rounded-md border transition
                    {{ $sort === 'honteux' ? 'bg-gray-800 text-white border-gray-800' : 'bg-white border-gray-300 text-gray-600 hover:bg-gray-50' }}">
                Plus honteux
            </button>
        </div>
    </div>

    {{-- Posts --}}
    <div class="space-y-4">
        @forelse ($posts as $post)
        <x-post-card :post="$post" />
        @empty
        <div class="text-center py-12 text-gray-400">
            <p class="text-lg">Aucune fierté pour l'instant.</p>
            <p class="text-sm">Sois le premier à partager ton échec</p>
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>