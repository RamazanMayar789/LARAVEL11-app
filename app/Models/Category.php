<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function parent(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function children(){
        return $this->hasMany(Category::class,'category_id','id');
    }
    public function submit($FormData  ,$categoryId){
        if($FormData['parentId']==""){

            $FormData['parentId']=null;
        }
        Category::query()->updateOrCreate([
            'id' => $categoryId,
        ],
        [
            'name' => $FormData['name'],
            'category_id' => $FormData['parentId'],
        ]
    );
    }
}
