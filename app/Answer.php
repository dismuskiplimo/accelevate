<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function attachments(){
        return $this->hasMany('App\Attachment', 'answer_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getMarks(){
    	return !is_null($this->marks) ? number_format($this->marks) . '/' . config('app.total_marks') : 'Not Marked';
    }
}
