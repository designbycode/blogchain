<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Like extends Component
{
    use InteractsWithBanner;

    public Model $model;

    public function likeModel($id): void
    {

        if (auth()->check()) {
            $userId = auth()->user()->id;
            if (!$this->model->liked($userId)) {
                $this->model->like($userId);
                $this->banner("You liked the post " . $this->model->title);

            } else {
                $this->model->unlike($userId);
                $this->warningBanner("You unliked the post " . $this->model->title);
            }
        } else {
            $this->dangerBanner('You are not logged in');
        }
    }

    public function render()
    {
        return view('like');
    }
}
