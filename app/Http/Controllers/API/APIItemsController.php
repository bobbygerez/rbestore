<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Item\ItemInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repo\FurtherCategory\FurtherCategoryInterface;

class APIItemsController extends Controller
{
    
	protected $item;
    protected $furtherCat;

    public function __construct(ItemInterface $item, FurtherCategoryInterface $furtherCat){

    	$this->item = $item;
        $this->furtherCat = $furtherCat;

    }

    public function index(){

        // $paginate = new LengthAwarePaginator($collection->forPage($request->page, $request->per_page), $collection->count(), $request->per_page, $request->page, ['path'=>url('api/products')]);

    	return response()->json([

    			'items' => $this->item->with('images')->orderBy('created_at', 'DESC')->paginate(10)
    		]);
    }

    public function furtherCategories(){

        $request = app()->make('request');
        $furtherCatRequest = collect($request->furtherCatId)->reverse()->values();

        return response()->json([
                 'further_categories' => $this->furtherCat->getNameBreadCrumbs($furtherCatRequest),
                 'items' => $this->item->whereIn('further_category_id', $furtherCatRequest)->with('images')->paginate(10)

            ]);
    }


}
