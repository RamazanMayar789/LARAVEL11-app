<?php

namespace App\Livewire\Admin\Slider;

use Livewire\Component;
use App\Models\Slider;
class Index extends Component
{
    public function render()
    {

        $sliders=Slider::query()->get();
        return view('livewire.admin.slider.index',
        [
            'sliders' => $sliders
        ]
        )->layout('layouts.admin.app');
    }
}
