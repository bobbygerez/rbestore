<?php 

namespace App\Repo;

interface BaseInterface {

	public function all();
	public function create( $request );
	// public function find($id);
	// public function where($fieldName, $id);
	// public function with($array);
}