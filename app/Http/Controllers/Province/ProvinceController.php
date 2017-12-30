<?php

namespace App\Http\Controllers\Province;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;


class ProvinceController extends Controller
{
    
    

    public function index(){

    	 return response()->json([
                'provinces' => Province::orderBy('provDesc')->get()
            ]);
    }

    

    	 
}
