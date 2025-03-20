<?php


namespace App\Repositories\client\product;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ClientProductRepository implements ClientProductRepositoryInterface
{
    public function getSingleProduct($p_code){

     return Product::query()
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
            ->with(['images', 'coverImage', 'seller'])
            ->firstOrFail();
    }

    public function checkProductInCart($productId){

       return Cart::query()->where([
            'product_id' => $productId,
            'user_id' => Auth::id()
        ])->exists();
    }

    public function addToCart($productId){

        Cart::query()->create([
            'product_id' => $productId,
            'user_id' => Auth::id(),
            'quantity' => 1
        ]);

    }
}
