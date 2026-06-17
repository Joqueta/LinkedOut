<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller

{
    use AuthorizesRequests;
    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        Post::create([
            'title'   => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
            'type_id' => $validated['type'],
        ]);

        return back()->with('success', 'Fierté publiée avec succès 😬');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->comment()->delete();
        $post->delete();

        return back()->with('success', 'Publication supprimée.');
    }
}
