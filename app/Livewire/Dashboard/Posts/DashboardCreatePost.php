<?php

namespace App\Livewire\Dashboard\Posts;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;


#[Layout('layouts.app')]
class DashboardCreatePost extends Component
{
    use InteractsWithBanner;

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

    #[On('content-updated')]
    public function dataFromEditor($value): void
    {
        $this->content = $value;
    }

    public function createPost(): void
    {
        $this->authorize('posts-create');
        $this->resetErrorBag();
        $this->resetValidation();
        $validated = $this->validate();

        $post = auth()->user()->posts()->create([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => preg_replace('/<(\w+)([^>]*)>\s*<\/\1>/', '', $this->content),
            'excerpt' => $this->excerpt,
            'category_id' => $this->category,
            'live' => $this->live,
        ]);


        $this->banner('Post created successfully.');

        $this->redirectRoute('dashboard.posts.edit', $post);
    }

    public function render(): View
    {
        return view('dashboard.posts.create-post');
    }
}
