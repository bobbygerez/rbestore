<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Item\ItemInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repo\FurtherCategory\FurtherCategoryInterface;
use App\Province;
use App\Repo\Category\CategoryInterface;
use App\Color;

class APIItemsController extends Controller
{
    
	protected $item;
    protected $category;
    protected $furtherCat;

    public function __construct(ItemInterface $item, FurtherCategoryInterface $furtherCat, CategoryInterface $category){

    	$this->item = $item;
        $this->category = $category;
        $this->furtherCat = $furtherCat;

    }

    public function index(){

        // $paginate = new LengthAwarePaginator($collection->forPage($request->page, $request->per_page), $collection->count(), $request->per_page, $request->page, ['path'=>url('api/products')]);

    	return response()->json([

    			'items' => $this->item->with(['images', 'province', 'userName', 'city', 'brgy', 'category', 'subcategory', 'furtherCategory', 'qty', 'colors'])->OrdPag()
                            
    		]);
    }

    public function furtherCategories(){

        $request = app()->make('request');
        $furtherCatRequest = collect($request->furtherCatId)->reverse()->values();

        return response()->json([
                 'further_categories' => $this->furtherCat->getNameBreadCrumbs($furtherCatRequest),
                 'items' => $this->item->whereIn('further_category_id', $furtherCatRequest)->withProduct()

            ]);
    }

    public function getItemDetails($uuid){

         return response()->json([

                'item' => $this->item->getItemDetails($uuid)
            ]);
    }

    public function startUp(){

        return response()->json([

                'provinces' => Province::orderBy('provDesc')->get(),
            ]);
    }

    public function itemSearch(){

            $request = app()->make('request');

            
            return response()->json([
                
                'searchProduct' => $this->item->where('name', 'like', '%'.$request->search.'%')

            ]);
    }


}
