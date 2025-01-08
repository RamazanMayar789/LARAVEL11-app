<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{

    protected $fillable = ['name','country_id'];
    public function country(){

        return $this->belongsTo(Country::class);
    }
    public function submit($FormData,$stateId){

          State::query()
->updateOrCreate(
    [
        'id'=>$stateId,
    ],
    [
'name'=>$FormData['name'],
'country_id'=>$FormData['countryId'],
]);

    }
}
