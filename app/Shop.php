<?php

namespace App;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ShopResetPasswordNotification;


class Shop extends Authenticatable
{
    //
    use Notifiable;

    protected $guard='shop';
    //https://stackoverflow.com/questions/22279435/what-does-mass-assignment-mean-in-laravel
    /**
     * the link above describes what mass assignment means
     *
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','category_id','description','phone','address','logo'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ShopResetPasswordNotification($token));
    }


    public function category(){
        return $this->belongsTo("App\Category");
    }

    public function posts(){
        return $this->hasMany("App\Post");
    }

    public function favorites()
    {
    return $this->hasMany("App\Favorite");
    }

    public function following()
    {
        return $this->hasmany("App\Follower");
    }
}
