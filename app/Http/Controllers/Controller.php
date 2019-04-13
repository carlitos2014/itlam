<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
	public function __construct($requireAuth=true)
	{
		if($requireAuth)
			$this->middleware('auth');
		if(property_exists($this, 'class')){
			$name =  strtolower(last(explode('\\',basename($this->class))));
			//dd($name);
			$this->middleware('permission:'.$name.'-index',  ['only' => ['index']]);
			$this->middleware('permission:'.$name.'-create', ['only' => ['create', 'store']]);
			$this->middleware('permission:'.$name.'-edit',   ['only' => ['edit', 'update']]);
			$this->middleware('permission:'.$name.'-delete', ['only' => ['destroy']]);
		}
	}
}
