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
    		return $province->whereIn('further_category_id', $request->furtherCatId)->withProduct();
    	}
    	else if($request->subcategoryId != null) {
    		return $province->whereIn('subcategory_id', $request->subcategoryId)->withProduct();
    	}
    	else if($request->categoryId != null) {
    		return $province->where('category_id', $request->categoryId)->withProduct();
    	}
    	
    	return $province->withProduct();
    	
    }


    public function category($request){

        $item = $this->modelName->where('category_id', $request->categoryId);

        if($request->provinceId != null){

            $item = $item->where('provCode', $request->provinceId);
        }
        else if( $request->cityId != null){
            
            $item = $item->where('citymunCode', $request->cityId);
        }
        else if( $request->brgyId != null){
            
            $item = $item->where('brgyCode', $request->brgyId);
        }

        return $item->withProduct();


    }

	
}