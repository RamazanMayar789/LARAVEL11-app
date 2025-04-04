<?php

namespace App\Livewire\Client\Cart;

use Livewire\Component;

class Item extends Component
{

    public $cartItems;
    public function render()
    {
        return view('livewire..client.cart.item');
    }
}
