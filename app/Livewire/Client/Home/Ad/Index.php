<?php

namespace App\Livewire\Client\Home\Ad;

use Livewire\Component;

class Index extends Component
{
    public function placeholder()
    {

        return view('Layouts.client.Placeholder.First-page.ad-Skeleton');
    }

    public function render()
    {
        return view('livewire.client.home.ad.index');
    }
}
