<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Category\CategoryInterface;
use App\Repo\SubCategory\SubCategoryInterface;
use App\Repo\FurtherCategory\FurtherCategoryInterface;


class APICategoryController extends Controller
{
    protected $category;
    protected $subcategory;
    protected $furtherCategory;

    public function __construct(CategoryInterface $category, SubCategoryInterface $subcategory, FurtherCategoryInterface $furtherCategory){

        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->furtherCategory = $furtherCategory;
    }
   
   	public function index()
    {
        
         return response()->json([
                'categories' => $this->category->all()
            ]);
    }

    public function getSubCategory($id){

    	
    	 return response()->json([
                'subcategories' => $this->subcategory->where('category_id', $id)->get()
            ]);
    }

    public function furtherCategories(){

        $request = app()->make('request');
        $furtherCat = collect($request->subcategoryIds)->reverse()->values();

       


        return response()->json([
                'furtherCategories' => $this->furtherCategory->whereIn('subcategory_id', $furtherCat)
            ]);
    }
}
