@props(['post'])

<div class="bg-white rounded-2xl shadow-md p-5 space-y-3">
    <div class="flex items-start justify-between">
        <div class="flex items-center gap-3">
            <img
                src="{{ $post->user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) . '&background=dc2626&color=fff&size=128' }}"
                alt="{{ $post->user->name }}"
                class="w-10 h-10 rounded-full object-cover">
            <div>
                <p class="text-sm font-semibold text-gray-800">{{ $post->user->name }}</p>
                <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
        @if ($post->type)
        <span class="inline-flex rounded-full border px-2.5 py-1 text-xs font-medium {{ $post->type->badge }}">
            {{ $post->type->name }}
        </span>
        @endif
    </div>

    <h3 class="font-semibold text-gray-900">{{ $post->title }}</h3>
    <p class="text-sm text-gray-700 leading-relaxed">{{ $post->content }}</p>

    @auth
    @if (Auth::id() === $post->user_id)
    <div class="flex justify-end">
        <form method="POST" action="{{ route('post.destroy', $post) }}">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="text-xs text-red-400 hover:text-red-600 transition"
                onclick="return confirm('Supprimer cette publication ?')">
                Supprimer
            </button>
        </form>
    </div>
    @endif
    @endauth
</div>