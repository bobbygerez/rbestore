<?php

namespace App\Http\Controllers\SubCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Controller\ResourceController;
use Auth;

class SubCategoryController extends Controller
{
    
    use ResourceController;

    protected $controllerName;
    
     public function __construct(){


		$this->middleware(function($request, $next){



			if(Auth::check()){

				$this->controllerName = 'App\Http\Controllers\SubCategory'. '\\'. Auth::User()->role() . 'SubCategoryController';

				return $next($request);
			}else{

				$this->controllerName = 'App\Http\Controllers\SubCategory\UserSubCategoryController';

				return $next($request);
			}

			
		});

    }

    
}
