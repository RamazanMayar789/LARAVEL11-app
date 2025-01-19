<?php

namespace App\Models;

use Intervention\Image\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Drivers\Gd\Driver;

class Product extends Model
{
    protected $guarded=[];

    public function submit($FormData,$productId,$photos){

$product=$this->SubmitToProduct($FormData,$productId);
$this->SubmitToSeo($FormData,$product->id);
$this->saveImage($product->id,$photos);





    }
    public function SubmitToProduct($FormData,$productId){

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

    public function saveImage($productId,$photos){


        foreach($photos as $photo){

            $this->resizeImage($photo,'100','100','small',$productId);
            $this->resizeImage($photo,'300','300','medium',$productId);
            $this->resizeImage($photo,'800','800','large',$productId);

            $photo->store('photos');
//$path='products/'.$productId.'/'.$FormData['slug'].'-'. time();
ProductImage::query()->create([


        'path'=>'test',
        'product_id'=>$productId,
]);
}
    }
    public function resizeImage($photo,$width,$height,$folder,$productId){

        $path=public_path(path: 'products/'.$productId.'/'.$folder);

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $manager = new ImageManager(new Driver());
        $manager->read($photo->getRealPath())->scale($width,$height)->toWebp()->save($path.'/'.$photo->hashName());
    }
}
