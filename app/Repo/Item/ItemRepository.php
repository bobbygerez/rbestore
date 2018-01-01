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

	
}