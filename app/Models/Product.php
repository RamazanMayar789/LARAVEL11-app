<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Drivers\Gd\Driver;

class Product extends Model
{
    protected $guarded=[];

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function coverImage(){
        return $this->belongsTo(ProductImage::class,'id','product_id')
        ->where('is_cover','=','true');
    }

    public function submit($FormData,$productId,$photos,$coverIndex){
DB::transaction(function() use ($FormData,$productId,$photos,$coverIndex){

$product=$this->SubmitToProduct($FormData,$productId);
$this->SubmitToSeo($FormData,$product->id);
$this->saveImage($product->id,$photos);
$this->submitToproductImage($photos,$product->id,$coverIndex);
});






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
    public function submitToproductImage($photos,$productId,$coverIndex){
        foreach($photos as $index => $photo){
            $path=pathinfo($photo->hashName(),PATHINFO_FILENAME).'.webp';
        //$path='products/'.$productId.'/'.$FormData['slug'].'-'. time();
ProductImage::query()->create([


        'path'=>$path,
        'product_id'=>$productId,
        'is_cover'=>$index==$coverIndex
]);
}

    }

}
