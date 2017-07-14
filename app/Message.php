<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_id','message'];

    /**
     * fungsi relasi many to one dengan tabel user
     * @return [type] [description]
     */
    public function user () {
    	return $this->belongsTo('App\User');
    }
}
