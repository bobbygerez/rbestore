<?php

namespace App\Http\Controllers\Barangay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brgy;

class BarangayController extends Controller
{
    

    public function getBarangays(){

    	$request = app()->make('request');

    	return response()->json([

                'brgys' => Brgy::where('citymunCode', $request->cityId)->orderBy('brgyDesc')->get()

            ]);
    }
}
