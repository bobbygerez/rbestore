<?php 

namespace App\Repo\SubCategory;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\SubCategory;



class SubCategoryRepository extends BaseRepository implements SubCategoryInterface{

    public function __construct(){

        $this->modelName = new SubCategory();
    }

    
    
	
}