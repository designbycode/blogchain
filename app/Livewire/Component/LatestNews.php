<?php

namespace App\Livewire\Component;

use App\Models\Post;
use Livewire\Component;

class LatestNews extends Component
{


    public function render()
    {
        return view('component.latest-news', [
            'posts' => Post::live()->with(['likes'])->latest()->take(3)->get(),
        ]);
    }
}
