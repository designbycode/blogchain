<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class ChartComponent extends Component
{

    public array $chartData = [];
    public array $chartOptions = [];

    public function mount(): void
    {
        // Example data
        $this->chartData = [
            'series' => [
                [
                    'name' => 'Sales',
                    'data' => [10, 41, 35, 51, 49, 62, 69, 91, 148],
                ]
            ]
        ];

        $this->chartOptions = [
            'chart' => [
                'type' => 'line',
                'height' => 350
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            ]
        ];
    }

    public function render(): View
    {
        return view('chart-component');
    }
}
