<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();


        if (Auth::check()) {

            return view('feed.index', [
                'posts' => $posts,
                'isAuthentificated' => true,
            ]);
        }

        return view('feed.index', [
            'posts' => $posts,

            'isAuthentificated' => false,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required', 'max:255'],
        ]);

        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);

        return back();
    }
}
