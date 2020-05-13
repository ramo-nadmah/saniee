<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
        return $this->belongsTo("App\Category");
    }
    public function shop(){
        return $this->belongsTo("App\Shop");
    }
    public function images(){
        return $this->hasMany("App\Image");
    }

    public function favorites(){
        return $this->hasMany("App\Favorite");
    }


//
//    public function category_shop()
//    {
//        return $this->belongsToMany("App\Category", "App\Shop");
//    }



    protected $fillable = [
        'name', 'body', 'category_id','shop_id','slogan','phone','price'

    ];
}
