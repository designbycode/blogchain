<?php

namespace App\Livewire\Dashboard\Post;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class DashboardCreatePost extends Component
{
    public string $title = '';
    public string $slug = '';
    public string $content = '';
    public string $excerpt = '';
    public string $category = '';
    public bool $live = false;
    public Collection $categories;

    public function mount(): void
    {
        $this->categories = Category::all();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|unique:posts,title',
            'content' => 'required|string',
            'excerpt' => 'required|string',
            'category' => 'required|exists:categories,id',
        ];
    }

    public function createPost(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $validated = $this->validate();

        $post = auth()->user()->posts()->create([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'excerpt' => $this->excerpt,
            'category_id' => $this->category,
            'live' => $this->live,
        ]);

        $this->dispatch('toast', message: 'Post created successfully.', type: 'success');
        $this->redirectRoute('dashboard.posts.edit', $post);
    }

    public function render(): View
    {
        return view('dashboard.post.create-post');
    }
}
