<?php

namespace App\Livewire\Dashboard\Post;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;


#[Layout('layouts.app')]
class DashboardIndexPost extends Component
{

    use WithPagination;

    public function deletePost($postId): void
    {

        // Find the post
        $post = Post::findOrFail($postId);

        // Delete the post
        $post->delete();


        $this->dispatch('toast', message: 'Post deleted successfully.', type: 'success');

    }

    public function render(): View
    {
        return view('dashboard.post.index-post', [
            'posts' => auth()->user()->posts()->latest()->paginate(5),
        ]);
    }
}
