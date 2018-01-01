<?php 

namespace App\Repo\SubCategory;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\SubCategory;

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
	
}