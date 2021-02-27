<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{

    protected $table = 'dealers';

    public function products(){
        return $this->hasMany('App\Product', 'dealer_id');
    }

}
