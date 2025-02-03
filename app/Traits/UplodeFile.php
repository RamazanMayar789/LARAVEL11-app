<?php

namespace App\Traits;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


trait UplodeFile
{

    protected function UplodeImageInFileWebpFormat($photo, $width, $height, $folder, $productId)
    {

        $path = public_path(path: 'products/' . $productId . '/' . $folder);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $manager = new ImageManager(new Driver());
        $manager->read($photo->getRealPath())->scale($width, $height)->toWebp()->
            save($path . '/' . pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.webp');

    }
}





?>
