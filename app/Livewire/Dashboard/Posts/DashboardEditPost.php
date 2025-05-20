<?php

namespace App\Livewire\Dashboard\Posts;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;


#[Layout('layouts.app')]
class DashboardEditPost extends Component
{

    use InteractsWithBanner, WithFileUploads;

    public Post $post;
    public string $title = '';
    public string $slug = '';
    public string $content = '';
    public string $excerpt = '';
    public string $category = '';
    public array $tags = [];
    public $image = null;
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
        $this->image = null;
        $this->tags = $this->post->tags->pluck('name')->toArray();
    }


    /**
     * @return array{title: string, content: string, excerpt: string, category: string, tags: string}
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|unique:posts,title,' . $this->post->id,
            'content' => 'required|string',
            'excerpt' => 'required|string',
            'category' => 'required|exists:categories,id',
            'tags' => 'array|nullable',
            'image' => 'nullable|sometimes|image|max:2024',
        ];
    }

    /**
     * @param $value
     * @return void
     */
    #[On('content-updated')]
    public function dataFromEditor($value): void
    {
        $this->content = $value;
    }

    #[On('tags-updated')]
    public function handleTagsUpdated($tags): void
    {
        $this->tags = array_values(array_unique($tags));
    }

    public function deleteImage(): void
    {
        $media = $this->post->getFirstMedia('posts');
        if ($media) {
            $media->delete();
            $this->image = $this->post->getFirstMediaUrl('posts');
            $this->post->refresh();
        }
    }

    /**
     * @throws AuthorizationException
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function updatePost(): void
    {


        $this->authorize('posts-update', $this->post);
        $this->resetErrorBag();
        $this->resetValidation();
        $validated = $this->validate();


        if ($this->image) {
            $this->post->addMedia($this->image)
                ->preservingOriginal()
                ->toMediaCollection('posts');
        }


        $post = $this->post->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => preg_replace('/<(\w+)([^>]*)>\s*<\/\1>/', '', $this->content),
            'excerpt' => $this->excerpt,
            'category_id' => $this->category,
            'live' => $this->live,
        ]);


        $this->post->syncTagsWithType($this->tags, 'posts');

        $this->banner('Post updated successfully.');
    }


    public function render(): View
    {
        return view('dashboard.posts.edit-post');
    }
}
