<?php

namespace App\Http\Controllers\Province;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
use App\Repo\Item\ItemInterface;


class ProvinceController extends Controller
{
    
    
    protected $item;

    public function __construct(ItemInterface $item){

    	$this->item = $item;

    }

    public function index(){

    	 $request = app()->make('request');
    	 return response()->json([
                'provinces' => Province::orderBy('provDesc')->get()
            ]);
    }

    

    	 
}
