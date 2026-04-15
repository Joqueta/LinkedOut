<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('feed') : view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/feed', [FeedController::class, 'index'])->name('feed');

    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/ranking', [RankingController::class, 'index'])->name('ranking');

    Route::get('/jobs', [JobController::class, 'index'])->name('jobs');

    Route::get('/generator', function () {
        return view('generator.index');
    })->name('generator');

    Route::get('/settings', function () {
        return view('settings.index');
    })->name('settings');
});

require __DIR__ . '/auth.php';
