<?php 

namespace App\Repo;

use Obfuscate;
use File;

class BaseRepository{

	protected $modelName;

	public function all(){

		return $this->modelName->all();
	}

	public function create($request){
		
		return $this->modelName->create($request->all());
	}

	public function where($field, $id){

		return $this->modelName->where($field, $id);
	}

	public function whereIn($field, $values){

		return $this->modelName->whereIn($field, $values);
	}

	
}