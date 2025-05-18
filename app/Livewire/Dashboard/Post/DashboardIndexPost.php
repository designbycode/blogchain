<?php

namespace App\Livewire\Dashboard\Post;

use App\Models\Post;
use Illuminate\View\View;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;


#[Layout('layouts.app')]
class DashboardIndexPost extends Component
{

    use WithPagination, InteractsWithBanner;

    #[Url]
    public string $search = '';

    public function deletePost($postId): void
    {

        // Find the post
        $post = Post::findOrFail($postId);

        // Delete the post
        $post->delete();
        $this->dangerBanner('Post deleted successfully.');

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
