<?php

namespace App\Livewire\Pages;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Layout('layouts.main'), Title('Home')]
class HomePage extends Component
{

    public function render(): View
    {
        return view('pages.home-page');
    }
}
