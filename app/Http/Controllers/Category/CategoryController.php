<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Controller\ResourceController;
use Auth;

class CategoryController extends Controller
{
	use ResourceController;

    protected $controllerName;
    
     public function __construct(){

     	

		$this->middleware(function($request, $next){


			if(Auth::check()){

				$this->controllerName = 'App\Http\Controllers\Category'. '\\'. Auth::User()->role() . 'CategoryController';

				return $next($request);
			}else{

				$this->controllerName = 'App\Http\Controllers\Category\UserCategoryController';

				return $next($request);
			}

			
		});

    }
}
