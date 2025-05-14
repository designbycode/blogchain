<?php

use App\Livewire\MemeCoins;
use App\Livewire\Pages\Posts\IndexPost;
use App\Livewire\Pages\Posts\ViewPost;
use Illuminate\Support\Facades\Route;

Route::get('/', MemeCoins::class)->name('home');
Route::get('/posts/', IndexPost::class)->name('posts.index');
Route::get('/posts/{post:slug}', ViewPost::class)->name('posts.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
