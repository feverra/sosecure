<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'title', 'detail', 'photo', 'viewer', 'user_id'
    ];

    public function get_user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
