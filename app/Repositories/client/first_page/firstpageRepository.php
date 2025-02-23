<?php


namespace App\Repositories\client\first_page;

use Carbon\Carbon;
use App\Models\Product;
class firstpageRepository implements first_pageRepositoryInterface
{


    public function getFeaturesProducts()
    {
        $userVisitDate = Carbon::now();
        $featureProduct = Product::query()
            ->whereNotNull('discount_duration')
            ->where('discount_duration', '>', $userVisitDate)
            ->where('featured', true)->with('coverImage','seoItems')
            ->
            get();

        return $featureProduct->map(function ($product) {

            $discountAmount = $product->discount ? ($product->price * $product->discount / 100) : 0;

            $product->finalprice = $product->price - $discountAmount;
            return $product;

        });


    }
}
