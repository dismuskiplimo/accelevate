<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function members(){
    	return $this->hasMany('App\GroupMember', 'group_id');
    }

    public function assignments(){
    	return $this->hasMany('App\GroupAssignment', 'group_id');
    }

    public function discussions(){
    	return $this->hasMany('App\GroupDiscussion', 'group_id');
    }
}
