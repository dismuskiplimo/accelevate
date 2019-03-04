<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function school(){
    	return $this->belongsTo('App\School', 'school_id');
    }

    public function answers(){
    	return $this->hasMany('App\Answer', 'project_id');
    }

}
