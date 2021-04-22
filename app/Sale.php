<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    protected $table = 'sales';

    public function products(){
        return $this->hasMany('App\ProductSales');
    }

    public function seller(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id');
    }

}
