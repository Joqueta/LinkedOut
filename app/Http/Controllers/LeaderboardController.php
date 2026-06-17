<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index()
    {
        $topUsers = $this->getTopUsers(50);
        return view('leaderboard.index', compact('topUsers'));
    }

    public static function getTopUsers(int $limit = 10)
    {
        return User::withCount([
            'posts as posts_this_month' => function ($query) {
                $query->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year);
            }
        ])
            ->orderByDesc('posts_this_month')
            ->limit($limit)
            ->get()
            ->filter(fn($user) => $user->posts_this_month > 0)
            ->values();
    }
}
