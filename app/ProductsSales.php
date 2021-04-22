<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsSales extends Model
{

    protected $table = 'products_sales';

    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function sale(){
        return $this->belongsTo('App\Sale', 'sale_id');
    }

}
