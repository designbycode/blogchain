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

    public function render(): View
    {
        return view('component.editor');
    }
}
