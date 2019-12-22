<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{   
    protected $guarded = ['id'];
    
    public static $rules = array(
      'body' => 'required',
      'from_user_id' => 'required',
      'to_user_id' => 'required',
    );
    
    public function from_user()
    {
      //set second variable to specify "Foreign Key". If not to do so, it will try to find 'user_id' in Message model as a foreign key.
      return $this->belongsTo('App\User', 'from_user_id');
    }
    
    public function to_user()
    {
      //set second variable to specify "Foreign Key". If not to do so, it will try to find 'user_id' in Message model as a foreign key.　
      return $this->belongsTo('App\User', 'to_user_id');
    }
}
