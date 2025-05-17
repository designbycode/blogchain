<?php

namespace App\Livewire\Component;

use Illuminate\View\View;
use Livewire\Component;

class Editor extends Component
{

//    public string $field;  // The field name to bind to
//    public string $content;
//    public string $placeholder = 'Write something...';
//    public string $editorId;
//
//    public function mount($field, $content = '', $placeholder = null): void
//    {
//        $this->field = $field;
//        $this->content = $content;
//        $this->placeholder = $placeholder ?? $this->placeholder;
//        $this->editorId = 'editor-' . uniqid();
//    }
//
//    public function updateContent($value): void
//    {
//        $this->content = $value;
//        $this->dispatch('editor-updated',
//            field: $this->field,
//            content: $this->content
//        );
//    }


    public function render(): View
    {
        return view('component.editor');
    }
}
