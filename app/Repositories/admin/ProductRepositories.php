<?php

namespace App\Repositories\admin;

use App\Models\Product;
use App\Models\seoItem;
use App\Traits\UplodeFile;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use App\Models\ProductFeatureValue;
use Illuminate\Support\Facades\File;
use App\Repositories\admin\ProductRepositoriesInterface;

class ProductRepositories implements ProductRepositoriesInterface
{

    use UplodeFile;

    public function submit($FormData, $productId, $photos, $coverIndex)
    {


        DB::transaction(function () use ($FormData, $productId, $photos, $coverIndex) {

            $product = $this->SubmitToProduct($FormData, $productId);
            $this->SubmitToSeo($FormData, $product->id);
            $this->submitToProductImage($photos, $product->id, $coverIndex);
            $this->saveImage($photos, $product->id);

        });





    }
    public function generateCode()
    {
        do {
            $randomcode = uniqid();
            $checkcode = Product::query()->where('p_code', $randomcode)->first();
        } while ($checkcode);

        return $randomcode;
    }
    public function SubmitToProduct($FormData, $productId)
    {

        $generatedCode = config('app.name') . '-' . $this->generateCode();

        return Product::query()->updateOrCreate(

            ['id' => $productId],


            [
                'name' => $FormData['name'],

                'price' => $FormData['price'],
                'discount' => $FormData['discount'],
                'stock' => $FormData['stock'],
                'featured' => $FormData['featured'],
                'seller_id' => $FormData['sellerId'],
                'category_id' => $FormData['categoryId'],
                'p_code' => $generatedCode
            ]

        );
    }


    public function SubmitToSeo($FormData, $productId)
    {

        seoItem::query()->updateOrCreate(
            [
                'type' => 'product',
                'ref_id' => $productId
            ],

            [

                'slug' => $FormData['slug'],
                'meta_titles' => $FormData['meta_title'],
                'meta_description' => $FormData['meta_description'],

            ]
        );
    }
    public function submitToproductImage($photos, $productId, $coverIndex)
    {


        // ProductImage::query()->where('product_id', $productId)->update(['is_cover' => false]);

        foreach ($photos as $index => $photo) {

            $path = pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.webp';

            ProductImage::query()->create(

                [
                    'path' => $path,
                    'product_id' => $productId,
                    'is_cover' => $index == $coverIndex,
                ]
            );
        }

    }


    public function saveImage($photos, $productId)
    {


        foreach ($photos as $photo) {

            $this->UplodeImageInFileWebpFormat($photo, '100', '100', 'small', $productId);
            $this->UplodeImageInFileWebpFormat($photo, '300', '300', 'medium', $productId);
            $this->UplodeImageInFileWebpFormat($photo, '800', '800', 'large', $productId);
            $photo->delete();
        }
    }
    public function removeProduct( $productId)
    {

        DB::transaction(function () use ($productId) {



            Product::query()->where('id', $productId)->delete();
            seoItem::query()->where('ref_id', $productId)->delete();
            ProductImage::query()->where('product_id', $productId)->delete();

            File::deleteDirectory('products');


        });
    }
    public function SubmitProductContent($FormData, $productId)
    {


        Product::query()->where('id', $productId)->update([
            'short_description' => $FormData['short_description'],
            'long_description' => $FormData['long_description'],
        ]);



    }

    public function removeOldPhoto($productImage, $productId)
    {

        $productImage->delete();
        File::delete(public_path('products/' . $productId . '/small/' . $productImage->path));
        File::delete(public_path('products/' . $productId . '/medium/' . $productImage->path));
        File::delete(public_path('products/' . $productId . '/large/' . $productImage->path));


    }

    public function setCoverOldImage($photoId, $productId)
    {




        ProductImage::query()->where('product_id', $productId)->update(['is_cover' => false]);
        ProductImage::query()->where([
            'product_id' => $productId,
            'id' => $photoId,
        ])->update(['is_cover' => true]);



    }

     public function submitProductFeatures($FormData, $productId)
    {



        foreach ($FormData as $value) {

            list($featureId, $featureValueId) = explode('_', $value);
            ProductFeatureValue::query()->updateOrCreate(
                [
                    'product_id' => $productId,
                    'category_feature_id' => $featureId,
                ],
                [
                    'category_feature_value_id' => $featureValueId,
                ]
            );


        }

}
}
