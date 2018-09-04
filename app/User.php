<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function recipes(){
        return $this->hasMany('App\Recipe');
    }

    public function favorites(){
        return $this->hasMany('App\Favorite');
    }

    public function fridge(){
        return $this->hasMany('App\Fridge');
    }

    public function shoplist(){
        return $this->hasMany('App\Shoplist');
    }

}
