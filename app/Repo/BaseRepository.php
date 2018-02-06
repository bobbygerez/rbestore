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

	public function paginate($value){

		return $this->modelName->paginate($value);
	}

	public function with($relation){

		return $this->modelName->with($relation);
	}

	public function whereHas($table, $field, $operator, $value){

		return $this->modelName->whereHas($table, function ($query) use ($field, $operator, $value){
				    $query->where($field, $operator, $value);
				});
	}

	
}