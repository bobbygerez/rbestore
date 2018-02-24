<?php 

namespace App\Repo\Branch;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Branch;

class APIBranchRepository extends BaseRepository implements BranchInterface{

    public function __construct(){

        $this->modelName = new Branch();
    }


    public function getProduct($request){

    	$branch = $this->whereHas('company', 'name', '=', $request->name )
                //add another where condition to get the branch
                    ->withRel()
                    ->first();

        $products = collect($branch->items);
        $page = $request->page;
		$perPage = 15;

		$paginator = new LengthAwarePaginator(
		    $products->forPage($page, $perPage), $products->count(), $perPage, $page
		);

    	return response()->json([
                'brancProducts' => $paginator
            ]);
    }
	
}