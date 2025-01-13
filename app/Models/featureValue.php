<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class featureValue extends Model
{
    protected $guarded=[];
public function submit($FormData,$featureId,$valueId){


   $feature=featureValue::query()->updateOrCreate(
        [
            'id' => $valueId
        ],
        [
            'value'=>$FormData['value'],
            'category_feature_id' => $featureId,
        ]


    );

}


}
