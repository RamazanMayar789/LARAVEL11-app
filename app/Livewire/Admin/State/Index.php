<?php

namespace App\Livewire\Admin\State;

use App\Models\Country;
use App\Models\State;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
public $countries=[];
    public function mount() {
       $this->countries= Country::all();

    }
    public function render()
    {

        $states=State::query()->paginate(10);
        return view('livewire.admin.state.index',
        [
            'states'=>$states
            ])->layout('layouts.admin.app');
    }
}
