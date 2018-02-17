<?php 

namespace App\Repo\Branch;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Branch;

class APIBranchRepository extends BaseRepository implements BranchInterface{

    public function __construct(){

        $this->modelName = new Branch();
    }
	
}