<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];
    
    public static $rules = array(
        'name' => 'required',
    );
    
    public function owner() {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
    
}
