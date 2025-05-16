<?php

namespace App\Livewire\Pages\Posts;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPost extends Component
{
    use WithPagination;


    public function render(): View
    {
        return view('pages.posts.index-post', [
            'posts' => Post::live()->with(['likes'])->latest()->simplePaginate(9),
        ]);
    }
}
