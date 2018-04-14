<?php 

namespace App\Repo\SubCategory;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\SubCategory;
use App\Item;
use Illuminate\Pagination\LengthAwarePaginator;

class APISubCategoryRepository extends BaseRepository implements SubCategoryInterface{

    public function __construct(){

        $this->modelName = new SubCategory();
    }

    public function getNameBreadCrumbs($furtherCat){

    	$collection = $this->modelName->whereIn('id', $furtherCat)->get();

    	return $collection->map(function ($item, $key) {
		    return [ 'text' => $item->name, 'to' => $item->name, 'disabled' => true];
		});
    }

    public function getItems($catId, $subId, $request){

        $items = Item::where('subcategory_id', $subId);

        if ($request->provinceId != null) {
            
            $items  = $items->where('provCode', $request->provinceId);
        }
        else if ($request->cityId != null) {

            $items  = $items->where('citymunCode', $request->cityId);
        }
        else if ($request->brgyId != null) {

             $items  = $items->where('brgyCode', $request->brgyId);
        }

        return $items->withOnly()->ordPag();
        
    }
	
}