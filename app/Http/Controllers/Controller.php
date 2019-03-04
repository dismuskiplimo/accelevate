<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $storage_path, $image_path;
    
    protected function initialize(){
		$this->storage_path  	= storage_path('downloads\attachments');
		$this->image_path 		= base_path(env('PUBLIC_PATH') . '/img/uploads');
    }
    
}
