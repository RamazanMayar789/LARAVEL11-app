<?php

namespace App\Livewire\Client\Product;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $product;



    public function mount($p_code){

$this->product=Product::query()
->where('p_code',$p_code)
->select('id','name','price','discount',
'discount_duration','category_id','stock','seller_id',
'p_code','featured')
->with('images','coverImage')
->firstOrFail();

 }
    public function render()
    {
        return view('livewire.client.product.index');
    }
}
