<?php

namespace App\Livewire\Component;

use Illuminate\View\View;
use Livewire\Component;

class Editor extends Component
{

    public string $content;


    public function mount($content): void
    {
        $this->content = $content;
    }

    public function updatedContent($value): void
    {
        $this->dispatch('content-updated', $value);
    }

    public function render(): View
    {
        return view('component.editor');
    }
}
