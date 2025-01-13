<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CategoryFeature extends Model
{
    protected $guarded = [];


    public function submit($FormData,$categoryId,$FeatureId){
   $feature=CategoryFeature::query()->updateOrCreate(
        [
            'id' => $FeatureId
        ],
        [
            'name'=>$FormData['name'],
            'category_id' => $categoryId
        ]


    );
  
}

     public function values(){
        return $this->hasMany(featureValue::class,'category_feature_id','id');
    }
}
