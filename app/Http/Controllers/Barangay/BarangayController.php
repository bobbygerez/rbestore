<?php

namespace App\Http\Controllers\Barangay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brgy;
use App\Repo\Item\ItemInterface;

class BarangayController extends Controller
{
    
	protected $item;

    public function __construct(ItemInterface $item){

        $this->item = $item;

    }

    public function getBarangays(){

    	$request = app()->make('request');

    	return response()->json([

                'brgys' => Brgy::whereIn('citymunCode', $request->cityId)->orderBy('brgyDesc')->get(),
                'items' => $this->item->withCities($request)
            ]);
    }

    public function getItems(){

        $request = app()->make('request');

        return response()->json([

                'items' => $this->item->withBrgy($request)
            ]);
    }
}
