<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupAssignment extends Model
{
    public function answers(){
    	return $this->hasMany('App\GroupAssignmentAnswer', 'group_assignment_id');
    }

    
}
