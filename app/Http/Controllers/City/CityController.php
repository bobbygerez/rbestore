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

    public function show($id)
    {
        return response()->json([
                'cities' => City::where('province_id', $id)->get()
            ]);
    }
}
