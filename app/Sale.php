<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    protected $table = 'sales';

    public function products(){
        return $this->hasMany('App\ProductSales');
    }

    public function seller(){
        return $this->hasOne('App\User', 'user_id');
    }

    public function customer(){
        return $this->hasOne('App\User', 'customer_id');
    }

}
