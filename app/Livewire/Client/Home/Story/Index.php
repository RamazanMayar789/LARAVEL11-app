<?php

namespace App\Livewire\Client\Home\Story;

use App\Models\Story;
use Livewire\Component;

class Index extends Component
{

    public $stories = [];

    public function placeholder()
    {

        return view('Layouts.client.Placeholder.First-page.stories-Skeleton');
    }


    public function mount()
    {

        $this->stories = Story::query()
            ->where('status', '=', true)
            ->limit(10)->get();
    }



    public function render()
    {

        return view('livewire.client.home.story.index');
    }
}
