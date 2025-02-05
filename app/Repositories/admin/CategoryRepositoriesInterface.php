<?php

namespace App\Repositories\admin;

interface CategoryRepositoriesInterface
{

     public function submit($FormData, $categoryId);

     public function submitToFeatureValues($FormData, $featureId, $valueId);
      public function submitToCategoryFeature($FormData, $categoryId, $FeatureId);

}
