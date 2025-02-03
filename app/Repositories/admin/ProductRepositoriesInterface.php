<?php


namespace App\Repositories\admin;
use App\Models\Product;
interface ProductRepositoriesInterface
{
    public function submit($FormData, $productId, $photos, $coverIndex);

    public function generateCode();

    public function SubmitToProduct($FormData, $productId);



    public function SubmitToSeo($FormData, $productId);

    public function submitToproductImage($photos, $productId, $coverIndex);


    public function saveImage($photos, $productId);



    public function removeProduct($productId);

 public function removeOldPhoto($productImage, $productId);
  public function setCoverOldImage($photoId,$productId);




    public function SubmitProductContent($FormData, $productId);
      public function submitProductFeatures($FormData, $productId);

}
