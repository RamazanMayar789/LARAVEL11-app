<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

protected $guarded = [];
    public function submit($FormData){


       $country= Country::query()->create([
            'name'=>$FormData['name'],
        ]);
    
    }
}
