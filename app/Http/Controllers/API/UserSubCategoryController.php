<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\SubCategory\SubCategoryInterface;

class UserSubCategoryController extends Controller
{
    
    protected $subcategory;

    public function __construct(SubCategoryInterface $subcategory){

        $this->subcategory = $subcategory;
    }

    public function categoryId($id){

    	dd('asdf');

    }
}
