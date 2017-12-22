<?php

use Illuminate\Database\Seeder;
use App\FurtherCategory;

class FurtherCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i=0; $i<100; $i++){

        	FurtherCategory::create([

        			'subcategory_id' => rand(1, 26),
        			'name' => 'Further Category ' . $i,

        		]);
        }
    }
}
