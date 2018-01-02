<?php 

namespace App\Repo\Item;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Item;
use App\User;

class ItemRepository extends BaseRepository implements ItemInterface{

    public function __construct(){

        $this->modelName = new Item();
    }

    public function getUseritems($request){

    	$userId = User::where('uuid', $request->uuid)->first()->id;

    	return $this->modelName->where('user_id', $userId);
    }

    public function withProvince($request){

    	$province = $this->modelName->where('provCode', $request->provinceId);

    	if ($request->furtherCatId != null) {
    		return $province->where('further_category_id', $request->furtherCatId)->get();
    	}
    	else if($request->subcategoryId != null) {
    		return $province->where('subcategory_id', $request->subcategoryId)->get();
    	}
    	else if($request->categoryId != null) {
    		return $province->where('category_id', $request->categoryId)->get();
    	}
    	
    	return $province->ordPag();
    	
    }

	
}