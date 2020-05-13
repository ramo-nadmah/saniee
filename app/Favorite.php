<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    public function user(){
        return $this->belongsTo("App\User");
    }
    public function shop(){
        return $this->belongsTo("App\Shop");
    }
    public function post(){
        return $this->belongsTo("App\Post");
    }

}
