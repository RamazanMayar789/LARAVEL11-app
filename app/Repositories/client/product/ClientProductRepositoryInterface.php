<?php


namespace App\Repositories\client\product;
interface ClientProductRepositoryInterface
{
	public function getSingleProduct($p_code);

     public function checkProductInCart($productId);

      public function addToCart($productId);
}
