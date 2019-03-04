<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupDiscussionComment extends Model
{
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function group_discussion(){
    	return $this->belongsTo('App\User', 'group_discussion_id');
    }
}
