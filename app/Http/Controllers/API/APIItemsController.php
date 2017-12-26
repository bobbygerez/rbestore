<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Item\ItemInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class APIItemsController extends Controller
{
    
	protected $item;

    public function __construct(ItemInterface $item){

    	$this->item = $item;

    }

    public function index(){

        // $paginate = new LengthAwarePaginator($collection->forPage($request->page, $request->per_page), $collection->count(), $request->per_page, $request->page, ['path'=>url('api/products')]);

    	return response()->json([

    			'items' => $this->item->with('images')->paginate(10)
    		]);
    }


}
