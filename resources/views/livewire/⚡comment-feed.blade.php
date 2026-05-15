<?php

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

new class extends Component
{
    public array $openedComments = [];
    public array $messages = [];

    #[On('post-created')]
    public function refreshFeed(): void
    {
        // Livewire re-render automatiquement.
    }

    public function toggleComments(int $postId): void
    {
        $this->openedComments[$postId] = !($this->openedComments[$postId] ?? false);
    }

    public function addComment(int $postId): void
    {
        $this->validate([
            "messages.$postId" => ['required', 'string', 'max:255'],
        ]);

        Comment::create([
            'post_id' => $postId,
            'user_id' => Auth::id(),
            'message' => $this->messages[$postId],
        ]);

        $this->resetValidation();

        $this->messages[$postId] = null;
        $this->openedComments[$postId] = true;
    }

    public function with(): array
    {
        return [
            'posts' => Post::with(['user', 'company', 'comment.user'])
                ->withCount('comment')
                ->latest('id')
                ->get(),
        ];
    }
};

?>

<div class="space-y-4" wire:poll.10s>
    @foreach ($posts as $post)
        <x-card class="card-hover smooth-appear" wire:key="post-{{ $post->id }}">

            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <img
                        src="{{ $post->user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) . '&background=dc2626&color=fff&size=128' }}"
                        alt="{{ $post->user->name }}"
                        class="w-10 h-10 rounded-full"
                    >

                    <div>
                        <a
                            href="{{ route('profile.show', $post->user) }}"
                            class="font-semibold text-gray-900 hover:underline"
                        >
                            {{ $post->user->name }}
                        </a>

                        <p class="text-xs text-gray-500">
                            {{ $post->company->name ?? 'Aucune entreprise' }}
                        </p>

                        <p class="text-xs text-gray-400">
                            {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>

                <button type="button" class="p-2 rounded-full hover:bg-gray-100 transition">
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                    </svg>
                </button>
            </div>

            <h3 class="mb-3 text-2xl font-semibold text-gray-700">
                {{ $post->title }}
            </h3>

            <p class="mb-4 text-gray-800 leading-relaxed">
                {{ $post->content }}
            </p>

            <div class="flex items-center justify-end gap-3 py-3 border-y border-gray-200 text-sm text-gray-600">
                <button
                    type="button"
                    wire:click="toggleComments({{ $post->id }})"
                    class="hover:underline"
                >
                    {{ $post->comment_count }} commentaires
                </button>
            </div>

            <div class="mt-3 flex items-center justify-around">
                @foreach([
                    '😬' => 'Gêné',
                    '👎' => 'Pas terrible',
                    '🫡' => 'Courage',
                    '🤣' => 'LOL',
                    '🕯️' => 'Condoléances'
                ] as $emoji => $label)
                    <button type="button" class="reaction-btn">
                        <span>{{ $emoji }}</span>
                        <span>{{ $label }}</span>
                    </button>
                @endforeach
            </div>

            @if ($openedComments[$post->id] ?? false)
                <div class="mt-4 border-t pt-4 space-y-3 smooth-appear">
                    @forelse ($post->comment as $comment)
                        <div
                            class="bg-gray-50 rounded-lg p-3 smooth-appear"
                            wire:key="comment-{{ $comment->id }}"
                        >
                            <div class="flex items-center gap-2 mb-2">
                                <img
                                    src="{{ $comment->user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($comment->user->name) . '&background=dc2626&color=fff&size=128' }}"
                                    alt="{{ $comment->user->name }}"
                                    class="w-6 h-6 rounded-full"
                                >

                                <p class="text-sm font-medium text-gray-800">
                                    {{ $comment->user->name }}
                                </p>
                            </div>

                            <p class="text-sm text-gray-700">
                                {{ $comment->message }}
                            </p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">
                            Aucun commentaire pour le moment.
                        </p>
                    @endforelse

                    @auth
                        <form
                            wire:submit.prevent="addComment({{ $post->id }})"
                            class="flex gap-2"
                        >
                            <textarea
                                wire:model.defer="messages.{{ $post->id }}"
                                wire:keydown.enter.prevent="addComment({{ $post->id }})"
                                wire:key="message-input-{{ $post->id }}-{{ $post->comment_count }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                placeholder="Écrire un commentaire..."
                            ></textarea>

                            <button
                                type="submit"
                                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition"
                            >
                                Envoyer
                            </button>
                        </form>

                        @error("messages.$post->id")
                            <p class="text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    @endauth
                </div>
            @endif

        </x-card>
    @endforeach
</div>