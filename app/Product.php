<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    public function dealer(){
        return $this->hasOne('App\Dealer');
    }

    public function sales(){
        return $this->hasMany('App\ProductsSales', 'product_id');
    }


}
