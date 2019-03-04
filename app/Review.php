<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function staff(){
    	return $this->belongsTo('App\User', 'staff_id');
    }

    public function student(){
    	return $this->belongsTo('App\User', 'student_id');
    }
}
