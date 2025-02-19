<?php

namespace App\Livewire\Client\Home\Banner;

use Livewire\Component;

class Index extends Component
{

    public function placeholder()
    {

        return view('Layouts.client.Placeholder.First-page.banner-Skeleton');
    }

    public function render()
    {
        return view('livewire.client.home.banner.index');
    }
}
