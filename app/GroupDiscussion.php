<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupDiscussion extends Model
{
    public function comments(){
    	return $this->hasMany('App\GroupDiscussionComment', 'group_discussion_id');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
