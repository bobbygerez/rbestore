<?php

namespace App\Http\Controllers\City;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;

class CityController extends Controller
{

	public function index(){

		 return response()->json([
                'provinces' => City::all()
            ]);
	}


    public function getCities(){

        $request = app()->make('request');

        return response()->json([

                'cities' => City::where('provCode', $request->provinceId)->orderBy('citymunDesc')->get()

            ]);
    }
}
