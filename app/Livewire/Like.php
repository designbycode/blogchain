<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Like extends Component
{

    public Model $model;

    public function likeModel($id): void
    {

        if (auth()->check()) {
            $userId = auth()->user()->id;
            if (!$this->model->liked($userId)) {
                $this->model->like($userId);
                $this->dispatch('toast', message: class_basename($this->model) . ' liked successfully.', type: 'success');
            } else {
                $this->model->unlike($userId);
                $this->dispatch('toast', message: class_basename($this->model) . ' unliked successfully.', type: 'success');
            }
        } else {
            $this->dispatch('toast', message: 'You need to be signed-in to be able to like post ' . $this->model->getTable(), type: 'info');
        }
    }

    public function render()
    {
        return view('like');
    }
}
