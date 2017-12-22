<?php 

namespace App\Repo\FurtherCategory;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\FurtherCategory;

class APIFurtherCategoryRepository extends BaseRepository implements FurtherCategoryInterface{

    public function __construct(){

        $this->modelName = new FurtherCategory();
    }
	
}