<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    public function dealer(){
        return $this->belongsTo('App\Dealer');
    }

    public function sales(){
        return $this->hasMany('App\ProductsSales', 'product_id');
    }


}
