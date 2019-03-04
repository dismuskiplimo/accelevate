<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function projects(){
        return $this->hasMany('App\Project', 'school_id');
    }
}
