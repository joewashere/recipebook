<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fridge extends Model
{
    //

    public function user(){
    	$this->belongsTo('App\User');
    }
}
