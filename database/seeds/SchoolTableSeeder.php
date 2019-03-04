<?php

use Illuminate\Database\Seeder;

use App\School;

use Carbon\Carbon;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	$now = Carbon::now();

        $schools = [
        	[
        		'name' => 'University of Nairobi',
        		'slug' => str_slug('University of Nairobi'),
        		'created_at'	=>	$now,
        		'updated_at'	=>	$now,
        	],

        	[
        		'name' => 'Kenyatta University',
        		'slug' => str_slug('Kenyatta University'),
        		'created_at'	=>	$now,
        		'updated_at'	=>	$now,
        	],

        	[
        		'name' => 'Jomo Kenyatta University of Agriculture and Technology',
        		'slug' => str_slug('Jomo Kenyatta University of Agriculture and Technology'),
        		'created_at'	=>	$now,
        		'updated_at'	=>	$now,
        	],

        	[
        		'name' => 'Moi University',
        		'slug' => str_slug('Moi University'),
        		'created_at'	=>	$now,
        		'updated_at'	=>	$now,
        	],

        	[
        		'name' => 'Strathmore University',
        		'slug' => str_slug('Strathmore University'),
        		'created_at'	=>	$now,
        		'updated_at'	=>	$now,
        	],

        	[
        		'name' => 'Muranga University of Technology',
        		'slug' => str_slug('Muranga University of Technology'),
        		'created_at'	=>	$now,
        		'updated_at'	=>	$now,
        	],

        ];

        School::insert($schools);
    }
}
