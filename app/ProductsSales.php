<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsSales extends Model
{

    protected $table = 'products_sales';

    public function product(){
        return $this->hasOne('App\Product');
    }

    public function sale(){
        return $this->hasOne('App\Sale');
    }

}
