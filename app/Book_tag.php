<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_tag extends Model
{
    protected $guarded = ['id'];
    
    public static $rules = array(
        'book_id' => 'required',
        'tag_id' => 'required',
    );
}
