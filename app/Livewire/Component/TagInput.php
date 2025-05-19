<?php

namespace App\Livewire\Component;

use Illuminate\View\View;
use Livewire\Component;

class TagInput extends Component
{

    public string $tag = '';
    public array $tags = [];

    public function mount($tags = []): void
    {
        $this->tags = is_array($tags)
            ? $tags
            : (is_iterable($tags) ? collect($tags)->toArray() : []);
    }


    public function addTag(): void
    {
        $input = $this->tag;
        $newTags = collect(explode(',', $input))
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->unique()
            ->toArray();

        // Only add tags that aren't already present
        foreach ($newTags as $tag) {
            if ($tag && !in_array($tag, $this->tags)) {
                $this->tags[] = $tag;
            }
        }

        $this->dispatch('tags-updated', $this->tags);
        $this->tag = '';
    }

    public function removeTag($index): void
    {
        unset($this->tags[$index]);
        $this->tags = array_values($this->tags); // reindex
        $this->dispatch('tags-updated', $this->tags);
    }


    public function render(): View
    {
        return view('component.tag-input');
    }
}
