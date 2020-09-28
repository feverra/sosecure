<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'comment', 'product_id', 'user_id'
    ];

    public function get_user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
