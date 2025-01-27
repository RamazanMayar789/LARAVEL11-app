<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{

    use SoftDeletes;

protected $fillable=['name','state_id'];

public function state(){

        return $this->belongsTo(State::class);
    }

      public function submit($FormData,$cityId){

          City::query()
->updateOrCreate(
    [
        'id'=>$cityId,
    ],
    [
'name'=>$FormData['name'],
'state_id'=>$FormData['stateId'],
]);

    }
}
