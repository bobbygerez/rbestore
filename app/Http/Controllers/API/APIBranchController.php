<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Branch\BranchInterface;


class APIBranchController extends Controller
{
    
    protected $branch;

    public function __construct(BranchInterface $branch){

    	$this->branch = $branch;

    }

    public function getProduct(Request $request){
    	return response()->json([
                'company' => $this->branch->whereHas('company', 'name', '=', $request->name )
                    ->withRel()
                    ->first()
            ]);
    }
}
