<?php

namespace App\Livewire\Client\Home\Slider;

use Livewire\Component;
use App\Models\Slider;
class Index extends Component
{
public $sliders=[];

public function mount(){

    $this->sliders=Slider::query()->where('status','=',true)->get();
}
    public function placeholder()
    {

        return view('Layouts.client.Placeholder.First-page.slider-Skeleton');
    }
    public function render()
    {
        return view('livewire.client.home.slider.index');
    }
}
