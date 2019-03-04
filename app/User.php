<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'usertype', 'school_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function is_admin(){
        return $this->usertype == 'ADMIN' && $this->is_admin ? true : false;
    }

    public function is_staff(){
        return $this->usertype == 'STAFF' && !$this->is_admin ? true : false;
    }

    public function is_teacher(){
        return $this->is_staff();
    }

    public function is_student(){
        return $this->usertype == 'STUDENT' && !$this->is_admin ? true : false;
    }

    public function projects(){
        return $this->hasMany('App\Project', 'user_id');
    }

    public function school(){
        return $this->belongsTo('App\School', 'school_id');
    }

    public function reviews(){
        return $this->hasMany('App\Review', 'student_id');
    }

    public function student_groups(){
        return $this->hasMany('App\GroupMember', 'student_id');
    }

    public function groups(){
        return $this->hasMany('App\Group', 'user_id');
    }

    public function cover(){
        return cover($this->cover_url);
    }

    public function image(){
        return profile_pic($this->img_url);
    }

    public function thumbnail(){
        return profile_thumb($this->thumb_url);
    }

    public function memberships(){
        return $this->hasMany('App\Membership', 'user_id');
    }

    public function education(){
        return $this->hasMany('App\Education', 'user_id');
    }

    public function work_experience(){
        return $this->hasMany('App\WorkExperience', 'user_id');
    }

    public function skills(){
        return $this->hasMany('App\Skill', 'user_id');
    }

    public function awards(){
        return $this->hasMany('App\Award', 'user_id');
    }

    public function hobbies(){
        return $this->hasMany('App\Hobby', 'user_id');
    }

    public function achievements(){
        return $this->hasMany('App\Achievement', 'user_id');
    }

}
