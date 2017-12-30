<?php

namespace App\Http\Controllers\Province;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
use App\City;

class ProvinceController extends Controller
{
    
    public function index(){

    	 return response()->json([
                'provinces' => Province::orderBy('provDesc')->get()
            ]);
    }

    

    	 
}
