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

    public function getItems($catId, $subId){

        $items = Item::where('subcategory_id', $subId)->withProduct();

       return $items;
        
    }
	
}