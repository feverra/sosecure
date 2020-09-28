<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'detail', 'photo', 'price', 'promotion_price', 'promotion_price_status', 'in_stock', 'viewer', 'user_id'
    ];

    public function get_user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
