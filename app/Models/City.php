<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{

   

protected $fillable=['name','state_id'];

public function state(){

        return $this->belongsTo(State::class);
    }


}
