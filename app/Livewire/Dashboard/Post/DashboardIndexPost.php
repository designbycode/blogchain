<?php

namespace App\Livewire\Dashboard\Post;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class DashboardIndexPost extends Component
{
    public function render(): View
    {
        return view('dashboard.post.index-post', [
            'posts' => auth()->user()->posts()->latest()->paginate(5),
        ]);
    }
}
