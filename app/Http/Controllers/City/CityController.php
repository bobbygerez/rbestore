<?php

namespace App\Http\Controllers\City;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Repo\Item\ItemInterface;

class CityController extends Controller
{
    protected $item;

    public function __construct(ItemInterface $item){

        $this->item = $item;

    }

	public function index(){

		 return response()->json([
                'provinces' => City::all()
            ]);
	}


    public function getCities(){

        $request = app()->make('request');

        return response()->json([

                'cities' => City::where('provCode', $request->provinceId)->orderBy('citymunDesc')->get(),
                'items' => $this->item->withProvince($request)

            ]);
    }
}
