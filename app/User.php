<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'surname', 'telephone', 'rfc', 'zip', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Custom

    /*public function role(){
        //Relación de uno a uno. solamente se traera un rol
        return $this->hasOne('App\Role');
    }*/

    //Relación Many To One / de muchos a uno
    public function role(){
        //Relación de muchos a uno
        return $this->belongsTo('App\Role');
    }

    public function sales(){
        //Relación de uno a muchos, todas las ventas que hace un vendedor
        return $this->hasMany('App\Sale', 'user_id');
    }

    public function purchases(){
        //Relación de uno a muchos, las compras que hace un cliente
        return $this->hasMany('App\Sale', 'customer_id');
    }

}
