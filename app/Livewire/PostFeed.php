<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class PostFeed extends Component
{
    use WithPagination;

    public string $filter = 'all';
    public string $sort = 'recent';

    public function updatedFilter(): void
    {
        $this->resetPage();
    }

    public function updatedSort(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Post::with(['user', 'type']);

        // Filtre par type
        if ($this->filter !== 'all') {
            $query->whereHas('type', fn($q) => $q->where('name', $this->filter));
        }

        // Tri
        if ($this->sort === 'recent') {
            $query->latest();
        }
        // 'honteux' = placeholder pour quand les réactions existeront

        $posts = $query->paginate(10);
        $types = Type::all();

        return view('livewire.post-feed', compact('posts', 'types'));
    }
}
