<?php


namespace App\Repositories\client\product;
interface ClientProductRepositoryInterface
{
	public function getSingleProduct($p_code);

     public function checkProductInCart($productId);

      public function addToCart($productId);

      public function getProductFeatures ($productId);


      public function getProductQA($productId);

      public function countqa();

    public function answer($productId);

    public function getProductReview($productId);

     public function submitProductReviews($FormData, $productId, $positiveItems, $NegativeItems);

      public function setVote($status, $ReviewId);

          public function submitQuestion($FormData,$productId);

          public function setVoteAnswer($status, $AnswerId);

         



}
