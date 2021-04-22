<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{

    protected $table = 'distributors';

    public function products(){
        return $this->hasMany('App\Product', 'distributor_id');
    }

}
