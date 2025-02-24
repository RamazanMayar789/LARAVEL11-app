<?php

namespace App\Livewire\Client\Product;

use Livewire\Component;

class Gallery extends Component
{

    public $images=[];

    public $coverImage;

    public $productId;
    public function render()
    {
        return view('livewire.client.product.gallery');
    }
}
