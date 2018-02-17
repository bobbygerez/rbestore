<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repo\Company\CompanyInterface;

use App\Province;
class APICompanyController extends Controller
{
    
    protected $company;

    public function __construct(CompanyInterface $company){

        $this->company = $company;
    }

    public function allStores(){

    	return response()->json([

                'provinces' => Province::orderBy('provDesc')->get(),
                'companies' => $this->company->whereHas('branches', 'province_id', '=', 40)
                                ->withRel()->userPlace()
            ]);
    	
    }

    public function getCompanies(Request $request){

        return response()->json([
                'companies' => $request->company_id
            ]);
    }

    public function getBranchProduct(Request $request){

        return response()->json([
                'company' => $this->company->whereHas('branches', 'province_id', '=', 41)
                    ->withRel()
                    ->withRelItems()
                    ->first()
            ]);

    }
    
}
