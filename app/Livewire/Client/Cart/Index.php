<?php

namespace App\Livewire\Client\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{

    public $cartItems=[];


    public function mount(){

        $this->cartItems=Cart::query()
        ->where('user_id',Auth::id())->with('product')
        ->get();
    }


    #[Layout('layouts.client.app-v2')]

    public function render()
    {



        return view('livewire.client.cart.index');
    }
}
