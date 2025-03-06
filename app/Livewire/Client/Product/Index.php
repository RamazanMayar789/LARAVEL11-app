<?php

namespace App\Livewire\Client\Product;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $product;



    public function mount($p_code)
    {

        $product = Product::query()
            ->where('p_code', $p_code)
            ->select(
                'id',
                'name',
                'price',
                'discount',
                'discount_duration',
                'category_id',
                'stock',
                'seller_id',
                'p_code',
                'featured'
            )
            ->with('images', 'coverImage')
            ->firstOrFail();
        if ($product) {

            $discountAmount = $product->discount ? ($product->price * $product->discount / 100) : 0;

            $product->finalprice = $product->price - $discountAmount;
           
        }

        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.client.product.index');
    }
}
