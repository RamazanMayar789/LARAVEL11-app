<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded=[];

public function coverImage(){
    return $this->belongsTo(ProductImage::class,'id','product_id')->where('is_cover','=',true);
}

    public function category(){

        return $this->belongsTo(Category::class);
    }




    public function submit($FormData,$productId,$photos,$coverIndex){


DB::transaction(function() use ($FormData,$productId,$photos,$coverIndex){

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
    }    public function SubmitToProduct($FormData,$productId){

        $generatedCode = config('app.name') . '-' . $this->generateCode();

 return Product::query()->updateOrCreate(

            ['id'=>$productId],


            [
                'name'=>$FormData['name'],

                'price'=>$FormData['price'],
                'discount'=>$FormData['discount'],
                'stock'=>$FormData['stock'],
                'featured'=>$FormData['featured'],
                'seller_id'=>$FormData['sellerId'],
                'category_id'=>$FormData['categoryId'],
                'p_code'=>$generatedCode
            ]

        );
    }


    public function SubmitToSeo($FormData,$productId){

 seoItem::query()->updateOrCreate(
            [
                'type'=>'product',
                'ref_id'=>$productId
            ],

            [

            'slug'=>$FormData['slug'],
            'meta_titles'=>$FormData['meta_title'],
            'meta_description'=>$FormData['meta_description'],

            ]
        );
    }
    public function submitToproductImage($photos, $productId, $coverIndex)
    {


        ProductImage::query()->where('product_id', $productId)->update(['is_cover' => false]);

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


    public function saveImage($photos, $productId){


        foreach($photos as $photo){

            $this->resizeImage($photo,'100','100','small',$productId);
            $this->resizeImage($photo,'300','300','medium',$productId);
            $this->resizeImage($photo,'800','800','large',$productId);
            $photo->delete();
        }
    }

    public function resizeImage($photo,$width,$height,$folder,$productId){

        $path=public_path(path: 'products/'.$productId.'/'.$folder);

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $manager = new ImageManager(new Driver());
        $manager->read($photo->getRealPath())->scale($width,$height)->toWebp()->
        save($path.'/'.pathinfo($photo->hashName(),PATHINFO_FILENAME).'.webp');
    }

    public function removeProduct(Product $product){
        DB::transaction(function() use ($product){
        $product->delete();


        seoItem::query()->where('ref_id', $product->id)->delete();
        ProductImage::query()->where('product_id', $product->id)->delete();

        File::deleteDirectory('products');


    });
}
public function seoItems(){

return $this->belongsTo(seoItem::class,'id','ref_id');

}

public function images(){

    return $this->hasMany(ProductImage::class);
}


}
