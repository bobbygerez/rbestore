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

    public function getItemDetails($uuid){

        return $this->modelName->where('uuid', $uuid)->withOnly()->first();
    }
    public function getUseritems($request){

    	$userId = User::where('uuid', $request->uuid)->first()->id;

    	return $this->modelName->where('user_id', $userId);
    }

    public function withProvince($request){

    	$province = $this->modelName->where('provCode', $request->provinceId);

    	return $this->filterByCategory($province, $request);
    	
    }

    public function withCities($request){

        $cities = $this->modelName->whereIn('citymunCode', $request->cityId);
        
        return $this->filterByCategory($cities, $request);
    }

    public function withBrgy($request){

         $brgy = $this->modelName->whereIn('brgyCode', $request->brgyId);

         return $this->filterByCategory($brgy, $request);
    }


    public function filterByCategory($place, $request){

        if($request->categoryId != null) {

            $place = $place->where('category_id', $request->categoryId);
        }

        if($request->subcategoryId != null) {
            $place = $place->whereIn('subcategory_id', $request->subcategoryId);
        }

        if ($request->furtherCatId != null) {
            $place = $place->whereIn('further_category_id', $request->furtherCatId);
        }

        return $place->withProduct();

    }


    public function category($request){

        $item = $this->modelName->where('category_id', $request->categoryId);
        return $this->filterByPlace($item, $request);

    }

    public function subcategory($request){
        
        $item = $this->modelName->whereIn('subcategory_id', $request->subcategoryIds);
        
        return $this->filterByPlace($item, $request);
    }


    public function filterByPlace($item, $request){

        if($request->provinceId != null){

            $item = $item->where('provCode', $request->provinceId);
        }
        if( $request->cityId != null){
            
            $item = $item->whereIn('citymunCode', $request->cityId);
        }
        if( $request->brgyId != null){
            
            $item = $item->whereIn('brgyCode', $request->brgyId);
        }

        return $item->withProduct();

    }

	
}