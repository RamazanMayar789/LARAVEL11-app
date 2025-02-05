<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryFeature extends Model
{
    protected $guarded = [];


  

     public function values(){
        return $this->hasMany(featureValue::class,'category_feature_id','id');
    }
    public function categoryFeatureValues()
    {
        return $this->hasMany(featureValue::class);
    }
}
