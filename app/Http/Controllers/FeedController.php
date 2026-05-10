<?php

namespace App\Http\Controllers;


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
}
