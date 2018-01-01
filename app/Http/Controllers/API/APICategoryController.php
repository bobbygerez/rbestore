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
                'categories' => $this->category->all()
            ]);
    }

    public function getSubCategory($id){

    	
    	 return response()->json([
                'category' => $this->category->where('id', $id)->first(),
                'subcategories' => $this->subcategory->where('category_id', $id)->get(),
                'items' => $this->item->where('category_id', $id)->with(['images', 'province', 'userName', 'city', 'brgy'])
                        ->paginate(10)
            ]);
    }

    public function furtherCategories(){

        $request = app()->make('request');
        $furtherCat = collect($request->subcategoryIds)->reverse()->values();

        return response()->json([
                'subcategories' => $this->subcategory->getNameBreadCrumbs($furtherCat),
                'furtherCategories' => $this->furtherCategory->whereIn('subcategory_id', $furtherCat),
                'items' => $this->item->whereIn('subcategory_id', $furtherCat)->with(['images', 'province', 'userName', 'city', 'brgy'])->paginate(10)
            ]);
    }

    
}
