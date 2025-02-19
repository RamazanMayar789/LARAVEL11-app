<?php

namespace App\Livewire\Client\Home\Offers;

use Livewire\Component;

class Index extends Component
{

    public function placeholder()
    {

        return view('Layouts.client.Placeholder.First-page.offers-Skeleton');
    }

    public function render()
    {
        return view('livewire.client.home.offers.index');
    }
}
