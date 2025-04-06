<?php
namespace App\Repositories\client\cart;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ClientCartRepositiry implements ClientCartRepositoryInterface
{
    public function updateCartQuantity($itemId, $action){
        $cartItem = Cart::query()->where('id', $itemId)
            ->with('product:id,stock')->first();

        if (!$cartItem) {

            return 'آیتم مورد نظر در سبد خرید یافت نشد !';
        }

        if ($action == 'increment') {
            if ($cartItem->quantity < $cartItem->product->stock) {
                $cartItem->increment('quantity', 1);

            } else {

                return true;
            }

        } elseif ($action == 'decrement') {

            if ($cartItem->quantity > 1) {
                $cartItem->decrement('quantity', 1);

            } else {

                $cartItem->delete();
            }
            return false;

        }


    }

    public function getCartItemWithCalucaltion(){

        $cartItems = Cart::query()
            ->where('user_id', Auth::id())->with('product')
            ->get()
            ->map(function ($item) {
                $product = $item->product;
                // original price for every one product
                $originalPrice = $product->price * $item->quantity;

                // amount of discount
                $discountAmount = $product->discount ? ($product->price * $product->discount / 100) * $item->quantity : 0;

                // after discount apply

                $discountedPrice = $originalPrice - $discountAmount;

                $item->originalPrice = $originalPrice;
                $item->discountAmount = $discountAmount;
                $item->discountedPrice = $discountedPrice;

                return $item;
            });

        $invoice = [


            'totalProductCount' => $cartItems->count(),
            'totaloriginalPrice' => $cartItems->sum('originalPrice'),

            'totaldiscountAmount' => $cartItems->sum('discountAmount'),
            'totaldiscountPrice' => $cartItems->sum('discountedPrice'),

        ];

        return compact('cartItems','invoice');

    }
}
