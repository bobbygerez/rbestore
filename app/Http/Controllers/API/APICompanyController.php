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
                                ->with(['images', 'branches.province', 'branches.city', 'branches.brgy', 'user'])->userPlace()
            ]);
    	
    }

    public function getCompanies(Request $request){

        return response()->json([
                'companies' => $request->company_id
            ]);
    }
    
}
