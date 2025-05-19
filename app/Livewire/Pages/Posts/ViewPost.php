<?php

namespace App\Livewire\Pages\Posts;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class ViewPost extends Component
{

    public Post $post;


    public function render(): View
    {
        return view('pages.posts.view-post', [
            'post' => $this->post->load('user', 'category', 'media', 'likes', 'tags'),
        ]);
    }
}
