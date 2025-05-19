<?php

namespace App\Livewire\Component;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class LatestNews extends Component
{


    public function render(): View
    {
        return view('component.latest-news', [
            'posts' => Post::live()->with(['likes', 'user', 'category', 'media'])->latest()->take(3)->get(),
        ]);
    }
}
