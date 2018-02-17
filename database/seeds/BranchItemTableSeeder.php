<?php

use Illuminate\Database\Seeder;
use App\Branch;

class BranchItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 500; $i++) { 
        	for ($i=1; $i < 290; $i++) { 
        	
        		$branch = Branch::find($i);
        		$branch->items()->attach([rand(1, 10000)]);
        	}
        }
        
    }
}
