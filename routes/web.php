<?php


use App\Livewire\Dashboard\Post\DashboardCreatePost;
use App\Livewire\Dashboard\Post\DashboardEditPost;
use App\Livewire\Dashboard\Post\DashboardIndexPost;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\Posts\IndexPost;
use App\Livewire\Pages\Posts\ViewPost;
use App\Livewire\Pages\TrendingCoinsPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/trending-coins', TrendingCoinsPage::class)->name('trending-coins');
Route::get('/posts/', IndexPost::class)->name('posts.index');
Route::get('/posts/{post:slug}', ViewPost::class)->name('posts.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])
    ->prefix('/dashboard')
    ->as('dashboard.')
    ->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('index');

        Route::get('/posts', DashboardIndexPost::class)->name('posts.index');
        Route::get('/posts/{post:id}/edit', DashboardEditPost::class)->name('posts.edit');
        Route::get('/posts/create', DashboardCreatePost::class)->name('posts.create');

    });
