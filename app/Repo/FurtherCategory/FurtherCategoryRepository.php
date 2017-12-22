<?php 

namespace App\Repo\FurtherCategory;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\FurtherCategory;

class FurtherCategoryRepository extends BaseRepository implements FurtherCategoryInterface{

    public function __construct(){

        $this->modelName = new FurtherCategory();
    }
	

	public function whereIn($field, $values){

		$placeholders = implode(',',array_fill(0, count($values), '?'));

		if (count($values) > 0) {
			
			return $this->modelName->whereIn($field, $values)
			 ->orderByRaw("field({$field},{$placeholders})", $values)->get();
		}

		return [];
		 
	}
}