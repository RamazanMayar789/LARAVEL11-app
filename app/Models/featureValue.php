<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class featureValue extends Model
{
    use SoftDeletes;
    protected $guarded=[];
public function submit($FormData,$featureId,$valueId){


   $feature=featureValue::query()->updateOrCreate(
        [
            'id' => $valueId
        ],
        [
            'value'=>$FormData['value'],
            'category_feature_id' => $featureId
        ]


    );

}



}
