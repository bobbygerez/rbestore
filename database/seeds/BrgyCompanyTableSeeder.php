<?php

use Illuminate\Database\Seeder;
use App\Company;

class BrgyCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($a=1; $a < 42000; $a++) { 

            for ($i=1; $i < 97; $i++) { 
            
            $company = Company::find($i);
            $company->brgy()->attach([
                    'barangay_id' => $a,
                    'company_id' => $i
                ]);
            }
        }
        
    }
}
