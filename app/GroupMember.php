<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    public function group(){
    	return $this->belongsTo('App\Group', 'group_id');
    }

    public function student(){
    	return $this->belongsTo('App\User', 'student_id');
    }

    public function staff(){
    	return $this->belongsTo('App\User', 'staff_id');
    }
}
