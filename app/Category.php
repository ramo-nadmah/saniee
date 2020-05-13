<?php

namespace App;

use Hamcrest\Thingy;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts(){
        return $this->hasMany("App\Post");
    }

    public function shops(){
        return $this->hasMany("App\Shop");
    }
}
