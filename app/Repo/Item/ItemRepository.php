<?php 

namespace App\Repo\Item;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Item;

class ItemRepository extends BaseRepository implements ItemInterface{

    public function __construct(){

        $this->modelName = new Item();
    }
	
}