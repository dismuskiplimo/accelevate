<?php

use Illuminate\Database\Seeder;

use App\{User};

use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    protected $date;

    public function __construct(){
    	$date = Carbon::now();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		'name'		=> 'Admin',
        		'email'		=> 'admin@mail.com',
        		'password'	=> bcrypt('administrator'),
        		'usertype'	=> 'ADMIN',
        		'is_admin'	=> 1,
        		'school_id'	=> 1,
        	],

        	[
        		'name'		=> 'Student',
        		'email'		=> 'student@mail.com',
        		'password'	=> bcrypt('student'),
        		'usertype'	=> 'STUDENT',
        		'is_admin'	=> 0,
        		'school_id'	=> 1,
        	],

        	[
        		'name'		=> 'Staff',
        		'email'		=> 'staff@mail.com',
        		'password'	=> bcrypt('staff'),
        		'usertype'	=> 'STAFF',
        		'is_admin'	=> 0,
        		'school_id'	=> 1,
        	],

        ];

        User::insert($users);
    }
}
