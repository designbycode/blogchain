<?php

use App\Livewire\Pages\Posts\IndexPost;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexPost::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
