<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    public function distributor(){
        return $this->belongsTo('App\Distributor');
    }

    public function sales(){
        return $this->hasMany('App\ProductsSales', 'product_id');
    }


}
