<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Type;

new class extends Component
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

        if ($this->filter !== 'all') {
            $query->whereHas('type', fn($q) => $q->where('name', $this->filter));
        }

        $query->when($this->sort === 'recent', fn($q) => $q->latest());

        return view('livewire.post-feed', [
            'posts' => $query->paginate(10),
            'types' => Type::all(),
        ]);
    }
};
?>

<div>
</div>