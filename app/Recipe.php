<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //

    public function steps(){
    	return $this->hasMany('App\Step');
    }

    public function ingredients(){
    	return $this->hasMany('App\Ingredient');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function favorites(){
    	return $this->hasMany('App\Favorite');
    }
}
