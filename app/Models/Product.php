<?php

namespace App\Models;

use App\Traits\UplodeFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes,UplodeFile;
    protected $guarded = [];

    public function coverImage()
    {
        return $this->belongsTo(ProductImage::class, 'id', 'product_id')->where('is_cover', '=', true);
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }





    // public function resizeImage($photo, $width, $height, $folder, $productId)
    // {

    //     $path = public_path(path: 'products/' . $productId . '/' . $folder);

    //     if (!file_exists($path)) {
    //         mkdir($path, 0777, true);
    //     }
    //     $manager = new ImageManager(new Driver());
    //     $manager->read($photo->getRealPath())->scale($width, $height)->toWebp()->
    //         save($path . '/' . pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.webp');
    // }

       public function seoItems()
    {

        return $this->belongsTo(seoItem::class, 'id', 'ref_id');

    }

    public function images()
    {

        return $this->hasMany(ProductImage::class);
    }


   

}
