<?php

namespace App\Livewire\Dashboard\Post;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;


#[Layout('layouts.app')]
class DashboardEditPost extends Component
{

    use InteractsWithBanner;

    public Post $post;
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
        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->content = $this->post->content;
        $this->excerpt = $this->post->excerpt;
        $this->category = $this->post->category->id;
        $this->live = $this->post->live;
    }


    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|unique:posts,title,' . $this->post->id,
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

    public function updatePost(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $validated = $this->validate();

        $post = $this->post->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => preg_replace('/<(\w+)[^>]*>\s*<\/\1>/', '', $this->content),
            'excerpt' => $this->excerpt,
            'category_id' => $this->category,
            'live' => $this->live,
        ]);
        $this->banner('Post updated successfully.');

    }


    public function render(): View
    {
        return view('dashboard.post.edit-post');
    }
}
