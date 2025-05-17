<?php

namespace App\Livewire\Dashboard\Post;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;


#[Layout('layouts.app')]
class DashboardIndexPost extends Component
{

    use WithPagination;

    #[Url]
    public string $search = '';

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
        $posts = auth()->user()->posts()->with('likes')->where('title', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('dashboard.post.index-post', [
            'posts' => $posts,
        ]);
    }
}
