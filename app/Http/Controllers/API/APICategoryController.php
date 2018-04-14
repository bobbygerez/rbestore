<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Category\CategoryInterface;
use App\Repo\SubCategory\SubCategoryInterface;
use App\Repo\FurtherCategory\FurtherCategoryInterface;

use App\Repo\Item\ItemInterface;

class APICategoryController extends Controller
{
    protected $category;
    protected $subcategory;
    protected $furtherCategory;
    protected $item;

    public function __construct(CategoryInterface $category, SubCategoryInterface $subcategory, FurtherCategoryInterface $furtherCategory, ItemInterface $item){

        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->furtherCategory = $furtherCategory;
        $this->item = $item;
    }
   
   	public function index()
    {
        
         return response()->json([
                'categories' => $this->category->with(['subcategory.furtherCategory'])->get()
            ]);
    }

    public function getSubCategory(){

    	$request = app()->make('request');
    	 return response()->json([
                'category' => $this->category->where('id', $request->categoryId)->first(),
                'subcategories' => $this->subcategory->where('category_id', $request->categoryId)->get(),
                'items' => $this->item->category($request)
            ]);
    }

    public function furtherCategories(){

        $request = app()->make('request');
        $furtherCat = collect( $request->subcategoryIds)->reverse()->values();

        return response()->json([
                'subcategories' => $this->subcategory->getNameBreadCrumbs($furtherCat),
                'furtherCategories' => $this->furtherCategory->whereIn('subcategory_id', $furtherCat),
                'items' => $this->item->subcategory($request)
            ]);
    }


    public function getItems($catId){

        $request = app()->make('request');
        return response()->json([
                'items' => $this->item->catPlace($catId, $request)
            ]);
    }

    
}
