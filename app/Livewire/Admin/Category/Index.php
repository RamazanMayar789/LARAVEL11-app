<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.category.index')->layout('layouts.admin.app');
    }
}
