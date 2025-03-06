<?php

namespace App\Livewire\Client\Product;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ByBox extends Component
{

    public $price;
    public $discount;
    public $finalprice;

    public $productId;

    public $incart=false;


    public function mount(){
        $this->incart=Cart::query()->where([
            'product_id'=>$this->productId,
            'user_id'=>Auth::id()
        ])->exists();
    }
    public function addToCart(){

        Cart::query()->create([
            'product_id'=>$this->productId,
            'user_id'=>Auth::id(),
            'quantity'=>1
        ]);

        $this->incart=true;
        $this->dispatch('add-to-cart', ProductId:$this->productId);
    }
    public function render()
    {
        return view('livewire.client.product.by-box');
    }
}
