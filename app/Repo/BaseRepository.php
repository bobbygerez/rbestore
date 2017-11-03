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

	
}