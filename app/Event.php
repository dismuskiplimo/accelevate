<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function image(){
		$path 		= base_path() . '/' . config('app.public_path') . '/' . 'img/uploads/events/';
		
		$image 	= $this->image;

		$file = $path . $image;

		if($image){
			if(file_exists($file)){
				return my_asset('img/uploads/events/' . $image);
			}else{
				return my_asset('img/1366x650.png');	
			}
		}else{
			return my_asset('img/1366x650.png');
		}
    }

    public function full_image(){
		$path 		= base_path() . '/' . config('app.public_path') . '/' . 'img/uploads/events/full/';
		
		$image 	= $this->image;

		$file = $path . $image;

		if($image){
			if(file_exists($file)){
				return my_asset('img/uploads/events/full/' . $image);
			}else{
				return my_asset('img/1366x650.png');	
			}
		}else{
			return my_asset('img/1366x650.png');
		}
    }
}
