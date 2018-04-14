<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\SubCategory\SubCategoryInterface;

class APISubCategoryController extends Controller
{

	protected $subCat;
    
    public function __construct(SubCategoryInterface $subCat){

    	$this->subCat = $subCat;
    }

    public function getItems($catId, $subId){

    	$request = app()->make('request');

    	return response()->json([

    			'items' => $this->subCat->getItems($catId, $subId, $request)
    		]);
    }
}
